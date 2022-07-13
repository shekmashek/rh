CREATE TABLE `autres_types_abonnements` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nom_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_fixe`  decimal(15,2),
  `prix_par_employe`  decimal(15,2),
  `min_emp` int(5) NOT NULL,
  `max_emp` int(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT  current_timestamp(),
  `updated_at` timestamp NULL DEFAULT  current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `entreprise_autres_abonnements` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `entreprise_id` bigint(20) UNSIGNED NOT NULL  REFERENCES entreprises(id) ON DELETE CASCADE,
  `autres_types_abonnements_id` bigint(20) UNSIGNED NOT NULL  REFERENCES autres_types_abonnements(id) ON DELETE CASCADE,
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

