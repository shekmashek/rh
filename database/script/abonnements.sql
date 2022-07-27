drop table if exists type_services;
CREATE TABLE `type_services` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `type_service` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT  current_timestamp(),
  `updated_at` timestamp NULL DEFAULT  current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO type_services(`type_service`) VALUES ("personnel"),("paie"),("congé"),("recrutement"),("temps");

drop table if exists autres_types_abonnements;
CREATE TABLE `autres_types_abonnements` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `type_service_id` bigint(20) UNSIGNED NOT NULL  REFERENCES type_services(id) ON DELETE CASCADE,
  `prix_fixe`  decimal(15,2),
  `prix_par_employe`  decimal(15,2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


drop table if exists limite_autres_abonnements;


drop table if exists entreprise_autres_abonnements;
CREATE TABLE `entreprise_autres_abonnements` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `entreprise_id` bigint(20) UNSIGNED NOT NULL  REFERENCES entreprises(id) ON DELETE CASCADE,
  `autres_types_abonnements_id` bigint(20) UNSIGNED NOT NULL  REFERENCES autres_types_abonnements(id) ON DELETE CASCADE,
  `date_demande` date default current_timestamp(),
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `activite` boolean not null default false,
  `coupon_id` bigint(20) unsigned default 0,
  `created_at` timestamp NULL DEFAULT  current_timestamp(),
  `updated_at` timestamp NULL DEFAULT  current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

drop table if exists factures_autres_abonnements;
CREATE TABLE `factures_autres_abonnements` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `entreprise_autres_abonnements_id` bigint(20) UNSIGNED NOT NULL  REFERENCES entreprise_autres_abonnements(id) ON DELETE CASCADE,
  `entreprise_id` bigint(20) UNSIGNED NOT NULL  REFERENCES entreprises(id) ON DELETE CASCADE,
  `invoice_date` date NOT NULL,
  `due_date` date NOT NULL,
  `num_facture` bigint(20) NOT NULL,
  `statut` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Non payé',
  `montant_facture` decimal(15,2) DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT  current_timestamp(),
  `updated_at` timestamp NULL DEFAULT  current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE OR REPLACE VIEW v_type_services_autres_types_abonnements as SELECT
     t.id,
     t.prix_fixe,
     t.prix_par_employe,
     s.id as service_id,
     s.type_service
FROM autres_types_abonnements as t
JOIN type_services as s ON s.id = t.type_service_id;



CREATE OR REPLACE VIEW v_autres_abonnement_entreprises as SELECT
    etp_ab.date_demande,
    etp_ab.date_debut,
    etp_ab.date_fin,
    etp_ab.activite,
    etp_ab.coupon_id,
    etp_ab.autres_types_abonnements_id,
    autres.service_id,
    autres.prix_fixe,
    autres.prix_par_employe,
    autres.type_service,
    fact.invoice_date,
    fact.due_date,
    fact.num_facture,
    fact.statut,
    fact.montant_facture,
    fact.entreprise_autres_abonnements_id,
    etp.id as entreprise_id,
    etp.*,
    month(fact.invoice_date) as mois_actuel,
    year(fact.invoice_date) as annee_actuel
FROM
    entreprise_autres_abonnements etp_ab
JOIN entreprises etp ON etp.id = etp_ab.entreprise_id
JOIN v_type_services_autres_types_abonnements autres ON  autres.id = etp_ab.autres_types_abonnements_id
JOIN factures_autres_abonnements fact ON fact.entreprise_autres_abonnements_id = etp_ab.id;
