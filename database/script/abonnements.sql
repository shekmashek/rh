
CREATE TABLE `type_services` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `type_service` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT  current_timestamp(),
  `updated_at` timestamp NULL DEFAULT  current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO type_services(`type_service`) VALUES ("personnel"),("paie"),("congé"),("recrutement"),("temps");

CREATE TABLE `autres_types_abonnements` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `type_service_id` bigint(20) UNSIGNED NOT NULL  REFERENCES type_services(id) ON DELETE CASCADE,
  `prix_fixe`  decimal(15,2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `limite_autres_abonnements` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `prix_par_employe`  decimal(15,2),
  `min_emp` int(5) NOT NULL,
  `max_emp` int(5) NOT NULL,
  `autres_types_abonnements_id` bigint(20) UNSIGNED NOT NULL  REFERENCES autres_types_abonnements(id) ON DELETE CASCADE,
  `created_at` timestamp NULL DEFAULT  current_timestamp(),
  `updated_at` timestamp NULL DEFAULT  current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `entreprise_autres_abonnements` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `entreprise_id` bigint(20) UNSIGNED NOT NULL  REFERENCES entreprises(id) ON DELETE CASCADE,
  `limite_autres_abonnements_id` bigint(20) UNSIGNED NOT NULL  REFERENCES limite_autres_abonnements(id) ON DELETE CASCADE,
  `date_demande` date default current_timestamp(),
  `date_debut` date DEFAULT current_timestamp(),
  `date_fin` date DEFAULT current_timestamp(),
  `activite` boolean not null default false,
  `coupon_id` bigint(20) unsigned default 0,
  `created_at` timestamp NULL DEFAULT  current_timestamp(),
  `updated_at` timestamp NULL DEFAULT  current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `factures_autres_abonnements` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `entreprise_autres_abonnements_id` bigint(20) UNSIGNED NOT NULL  REFERENCES entreprise_autres_abonnements(id) ON DELETE CASCADE,
  `invoice_date` date NOT NULL,
  `due_date` date NOT NULL,
  `num_facture` bigint(20) NOT NULL,
  `statut` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Non payé',
  `montant_facture` decimal(15,2) DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT  current_timestamp(),
  `updated_at` timestamp NULL DEFAULT  current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




CREATE OR REPLACE VIEW v_type_services_autres_types_abonnements as SELECT
     t.id,
     t.prix_fixe,
     s.id as service_id,
     s.type_service,
     l.
FROM autres_types_abonnements as t
JOIN type_services as s ON s.id = t.type_service_id
;



CREATE OR REPLACE VIEW v_autres_abonnement_limite as SELECT
    limite.*,
    v_type_serv.prix_fixe,
    v_type_serv.service_id,
    v_type_serv.type_service

FROM
    limite_autres_abonnements limite
JOIN v_type_services_autres_types_abonnements as v_type_serv ON v_type_serv.id = limite.autres_types_abonnements_id;
