<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maquette atelier multi-services</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #0f172a;
            --accent: #f97316;
            --accent-2: #0ea5e9;
            --surface: rgba(255, 255, 255, 0.8);
            --muted: #64748b;
            --radius: 14px;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "Space Grotesk", system-ui, -apple-system, sans-serif;
            color: var(--ink);
            background:
                radial-gradient(circle at 20% 20%, rgba(14, 165, 233, 0.18), transparent 32%),
                radial-gradient(circle at 80% 30%, rgba(249, 115, 22, 0.16), transparent 30%),
                linear-gradient(135deg, #f8fafc 0%, #e2e8f0 50%, #f8fafc 100%);
            min-height: 100vh;
        }

        header {
            padding: 32px 24px 12px;
            text-align: center;
        }

        .hero {
            background: var(--surface);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 28px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 18px;
            box-shadow: 0 18px 60px rgba(15, 23, 42, 0.12);
            max-width: 1100px;
            margin: 0 auto;
        }

        .hero h1 {
            margin: 0;
            font-size: 28px;
            letter-spacing: -0.02em;
        }

        .hero p {
            margin: 8px 0 0;
            color: var(--muted);
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #0ea5e914;
            color: #0f172a;
            padding: 8px 12px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 600;
        }

        main {
            max-width: 1200px;
            margin: 22px auto 48px;
            padding: 0 20px;
        }

        .tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-bottom: 18px;
        }

        .tab-btn {
            border: 1px solid #e2e8f0;
            padding: 12px 18px;
            border-radius: var(--radius);
            background: white;
            cursor: pointer;
            font-weight: 600;
            color: var(--ink);
            transition: all 0.2s ease;
        }

        .tab-btn.active {
            background: linear-gradient(135deg, #0ea5e9, #f97316);
            color: white;
            border-color: transparent;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.15);
        }

        .tab-panel { display: none; }
        .tab-panel.active { display: block; }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 16px;
        }

        .card {
            background: white;
            border-radius: var(--radius);
            padding: 16px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 6px 20px rgba(15, 23, 42, 0.07);
            cursor: pointer;
            transition: transform 0.12s ease, box-shadow 0.12s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.12);
        }

        .card h3 { margin: 0; font-size: 18px; }

        .meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--muted);
            font-size: 13px;
            margin-bottom: 6px;
        }

        .status {
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 999px;
            color: #0f172a;
        }

        .status.encours { background: #f59e0b1f; color: #b45309; }
        .status.pause { background: #e2e8f0; color: #475569; }
        .status.fini { background: #22c55e20; color: #166534; }

        .chips {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 10px;
            color: var(--muted);
            font-size: 13px;
        }

        .chip {
            background: #f1f5f9;
            padding: 6px 10px;
            border-radius: 10px;
        }

        .progress {
            margin-top: 10px;
            background: #e2e8f0;
            border-radius: 10px;
            height: 8px;
            overflow: hidden;
        }

        .progress span {
            display: block;
            height: 100%;
            background: linear-gradient(135deg, #0ea5e9, #f97316);
        }

        .filter-row {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin: 8px 0 14px;
        }

        .filter-btn {
            border: 1px solid #cbd5e1;
            background: #f8fafc;
            padding: 8px 14px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            color: var(--ink);
            transition: all 0.2s ease;
        }

        .filter-btn.active {
            background: linear-gradient(135deg, #0ea5e9, #f97316);
            color: white;
            border-color: transparent;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.12);
        }

        .search-row {
            display: grid;
            grid-template-columns: 1fr auto auto;
            gap: 10px;
            align-items: center;
            margin: 0 0 12px;
        }

        .search-input {
            width: 100%;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 11px 12px;
            font-family: inherit;
            font-size: 14px;
        }

        .search-info {
            color: var(--muted);
            font-size: 13px;
            min-width: 140px;
            text-align: right;
        }

        .storage-board {
            margin-top: 18px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 16px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.08);
        }

        .storage-title {
            margin: 0 0 12px;
            font-size: 18px;
        }

        .storage-grid {
            display: grid;
            gap: 12px;
            grid-template-columns: 1fr 1px 1fr;
        }

        .storage-divider {
            background: #d5dfeb;
            min-height: 100%;
        }

        .storage-zone {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px;
        }

        .storage-zone h4 {
            margin: 0 0 8px;
            font-size: 15px;
        }

        .stock-line {
            display: grid;
            grid-template-columns: auto 1fr auto;
            gap: 8px;
            align-items: center;
            margin: 7px 0;
            font-size: 13px;
            color: #334155;
        }

        .stock-track {
            height: 8px;
            border-radius: 999px;
            background: #dbe7f3;
            overflow: hidden;
        }

        .stock-fill {
            display: block;
            height: 100%;
            border-radius: 999px;
            background: linear-gradient(135deg, #0ea5e9, #f97316);
            width: 0;
        }

        .storage-subtitle {
            margin: 12px 0 8px;
            font-size: 13px;
            color: var(--muted);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .ilot-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
            gap: 8px;
        }

        .ilot-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 8px;
        }

        .ilot-btn {
            width: 100%;
            text-align: left;
            cursor: pointer;
            font-family: inherit;
        }

        .ilot-btn.active {
            border-color: #0ea5e9;
            box-shadow: 0 0 0 1px #0ea5e9 inset;
            background: #f0f8ff;
        }

        .ilot-name {
            margin: 0 0 6px;
            font-size: 13px;
            font-weight: 700;
            color: #0f172a;
        }

        .ilot-stat {
            font-size: 12px;
            color: #475569;
            margin: 2px 0;
        }

        .ilot-detail {
            margin-top: 14px;
            border-top: 1px dashed #cbd5e1;
            padding-top: 12px;
        }

        .ilot-detail-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
            flex-wrap: wrap;
        }

        .ilot-detail-title {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
        }

        .ilot-detail-summary {
            font-size: 12px;
            color: #475569;
        }

        .ilot-task-list {
            display: grid;
            gap: 8px;
        }

        .ilot-task-item {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: #ffffff;
            padding: 8px;
        }

        .ilot-task-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 8px;
            margin-bottom: 6px;
            flex-wrap: wrap;
        }

        .ilot-task-id {
            font-size: 13px;
            font-weight: 700;
            color: #0f172a;
        }

        .ilot-task-machine {
            font-size: 12px;
            color: #64748b;
        }

        .ilot-task-stock {
            font-size: 12px;
            color: #334155;
            margin-bottom: 7px;
        }

        .task-actions {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .task-btn {
            border: 1px solid #cbd5e1;
            background: #f8fafc;
            color: #0f172a;
            border-radius: 8px;
            padding: 5px 8px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            font-family: inherit;
        }

        .task-btn.danger {
            border-color: #f3c5c5;
            background: #fff7f7;
            color: #9f1239;
        }

        .thermo-tools {
            display: grid;
            gap: 10px;
            margin-bottom: 10px;
        }

        .form-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 18px;
            box-shadow: 0 10px 26px rgba(15, 23, 42, 0.08);
            max-width: 760px;
            margin: 0 auto;
        }

        .form-grid {
            display: grid;
            gap: 12px;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        }

        .form-group label {
            font-weight: 700;
            display: block;
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 15px;
            font-family: inherit;
        }

        .note {
            color: var(--muted);
            font-size: 13px;
            margin-top: 8px;
        }

        .modal {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.35);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 16px;
            z-index: 30;
        }

        .modal.active { display: flex; }

        .modal-box {
            background: white;
            border-radius: 18px;
            padding: 22px;
            width: min(860px, 100%);
            max-height: 90vh;
            overflow: auto;
            box-shadow: 0 18px 46px rgba(15, 23, 42, 0.2);
            border: 1px solid #e2e8f0;
        }

        .modal-box h4 { margin: 0 0 6px; font-size: 22px; }
        .modal-box p { margin: 4px 0 10px; color: var(--muted); }

        .modal-actions {
            margin-top: 14px;
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .btn {
            border: none;
            padding: 10px 14px;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            font-family: inherit;
        }

        .btn.secondary { background: #f1f5f9; color: #0f172a; }
        .btn.primary { background: linear-gradient(135deg, #0ea5e9, #f97316); color: white; }

        .toast {
            position: fixed;
            right: 16px;
            bottom: 16px;
            background: white;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            box-shadow: 0 12px 34px rgba(15, 23, 42, 0.14);
            padding: 10px 12px;
            font-size: 14px;
            opacity: 0;
            transform: translateY(8px);
            transition: all 0.2s ease;
            pointer-events: none;
            z-index: 50;
        }

        .toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        footer {
            text-align: center;
            padding: 26px 0 36px;
            color: var(--muted);
            font-size: 13px;
        }

        @media (max-width: 640px) {
            header { padding: 22px 16px 6px; }
            main { padding: 0 12px; }
            .tab-btn { flex: 1 1 45%; text-align: center; }
            .modal-box { padding: 16px; }
            .search-row { grid-template-columns: 1fr; }
            .search-info { text-align: left; min-width: 0; }
            .storage-grid { grid-template-columns: 1fr; }
            .storage-divider { display: none; }
            .task-actions { gap: 4px; }
        }
    </style>
</head>
<body>
<?php
function h($value): string {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function slug(string $label): string {
    return strtolower(trim((string) preg_replace('/[^a-z0-9]+/i', '-', $label), '-'));
}

function format_tache(string $raw): string {
    $year = date('y');
    $raw = trim($raw);
    if (preg_match('/^\d{5}\/\d{2}$/', $raw)) {
        return $raw;
    }
    $digits = preg_replace('/[^0-9]/', '', $raw);
    if ($digits === '') {
        return '00000/' . $year;
    }
    $fiveDigits = substr(str_pad($digits, 5, '0', STR_PAD_LEFT), -5);
    return $fiveDigits . '/' . $year;
}

$serviceFields = [
    'Impression' => [
        ['key' => 'nombre_feuilles', 'label' => 'Nombre de feuilles', 'type' => 'number'],
        ['key' => 'type_feuille', 'label' => 'Type de feuille', 'type' => 'text'],
        ['key' => 'tableau_impression', 'label' => "Tableau d'impression", 'type' => 'text'],
        ['key' => 'masse_couleur', 'label' => 'Masse de couleur', 'type' => 'text'],
    ],
    'Thermoformage' => [
        ['key' => 'machine_thermo', 'label' => 'Machine thermo', 'type' => 'text'],
        ['key' => 'nombre_feuilles_thermo', 'label' => 'Nombre de feuilles thermo', 'type' => 'number'],
        ['key' => 'plaque_thermo', 'label' => 'Plaque de thermo', 'type' => 'text'],
        ['key' => 'temperature_thermo', 'label' => 'Temperature de thermo', 'type' => 'text'],
        ['key' => 'machine_decoupe', 'label' => 'Machine decoupe', 'type' => 'text'],
        ['key' => 'nombre_feuilles_decoupe', 'label' => 'Nombre de feuilles decoupe', 'type' => 'number'],
        ['key' => 'outil_decoupe', 'label' => 'Outil de decoupe', 'type' => 'text'],
        ['key' => 'conditionnement', 'label' => 'Conditionnement', 'type' => 'select', 'options' => ['Cagette', 'Carton']],
        ['key' => 'machine_illig', 'label' => 'Machine Illig', 'type' => 'text'],
        ['key' => 'nombre_feuilles_illig', 'label' => 'Nombre de feuilles Illig', 'type' => 'number'],
        ['key' => 'type_carton', 'label' => 'Type de carton', 'type' => 'text'],
        ['key' => 'feuilles_par_carton', 'label' => 'Nombre de feuilles par carton', 'type' => 'number'],
        ['key' => 'nombre_cartons', 'label' => 'Nombre de cartons', 'type' => 'number'],
    ],
    'Chocolaterie' => [
        ['key' => 'type_chocolat', 'label' => 'Type de chocolat', 'type' => 'text'],
        ['key' => 'temperature', 'label' => 'Temperature', 'type' => 'text'],
        ['key' => 'nombre_feuilles', 'label' => 'Nombre de feuilles', 'type' => 'number'],
    ],
    'Emballage' => [
        ['key' => 'nombre_boites', 'label' => 'Nombre de boites', 'type' => 'number'],
        ['key' => 'nombre_feuilles_par_boite', 'label' => 'Nombre de feuilles par boite', 'type' => 'number'],
        ['key' => 'type_carton', 'label' => 'Type de carton', 'type' => 'text'],
        ['key' => 'nombre_feuilles', 'label' => 'Nombre de feuilles', 'type' => 'number'],
        ['key' => 'nombre_cartons', 'label' => 'Nombre de cartons', 'type' => 'number'],
    ],
];

$taskSeed = 12654;
$nextTask = function () use (&$taskSeed): string {
    $taskId = sprintf('%05d/%s', $taskSeed, date('y'));
    $taskSeed++;
    return $taskId;
};

$thermoMachines = [];
for ($i = 1; $i <= 6; $i++) {
    $zoneStockage = $i <= 3 ? 'Emballage' : 'Chocolaterie';
    $ilotChocolaterie = $zoneStockage === 'Chocolaterie' ? ('Ilot ' . ($i - 3)) : '';
    $thermoMachines[] = [
        'machine' => 'Thermo-G1-' . str_pad((string) $i, 2, '0', STR_PAD_LEFT),
        'tache_id' => $nextTask(),
        'etat' => $i === 6 ? 'Pause' : 'En cours',
        'avancement' => 40 + ($i * 5),
        'groupe_machine' => 'thermo-g1',
        'groupe_label' => 'Thermo groupe 1',
        'machine_thermo' => 'Thermo-' . str_pad((string) $i, 2, '0', STR_PAD_LEFT),
        'nombre_feuilles_thermo' => 7000 + ($i * 210),
        'plaque_thermo' => 'Plaque PET ' . chr(64 + $i),
        'temperature_thermo' => (160 + $i) . ' C',
        'conditionnement' => $i % 2 === 0 ? 'Carton' : 'Cagette',
        'zone_stockage' => $zoneStockage,
        'ilot_chocolaterie' => $ilotChocolaterie,
    ];
}
for ($i = 1; $i <= 6; $i++) {
    $zoneStockage = $i <= 3 ? 'Emballage' : 'Chocolaterie';
    $ilotChocolaterie = $zoneStockage === 'Chocolaterie' ? ('Ilot ' . ($i + 1)) : '';
    $machineNumber = $i + 6;
    $thermoMachines[] = [
        'machine' => 'Thermo-G2-' . str_pad((string) $i, 2, '0', STR_PAD_LEFT),
        'tache_id' => $nextTask(),
        'etat' => $i === 5 ? 'Pause' : 'En cours',
        'avancement' => 44 + ($i * 5),
        'groupe_machine' => 'thermo-g2',
        'groupe_label' => 'Thermo groupe 2',
        'machine_thermo' => 'Thermo-' . str_pad((string) $machineNumber, 2, '0', STR_PAD_LEFT),
        'nombre_feuilles_thermo' => 7600 + ($i * 230),
        'plaque_thermo' => 'Plaque PS ' . chr(70 + $i),
        'temperature_thermo' => (161 + $i) . ' C',
        'conditionnement' => $i % 2 === 0 ? 'Cagette' : 'Carton',
        'zone_stockage' => $zoneStockage,
        'ilot_chocolaterie' => $ilotChocolaterie,
    ];
}
for ($i = 1; $i <= 4; $i++) {
    $zoneStockage = $i <= 2 ? 'Emballage' : 'Chocolaterie';
    $ilotChocolaterie = $zoneStockage === 'Chocolaterie' ? ('Ilot ' . ($i + 4)) : '';
    $thermoMachines[] = [
        'machine' => 'Decoupe-' . str_pad((string) $i, 2, '0', STR_PAD_LEFT),
        'tache_id' => $nextTask(),
        'etat' => $i === 4 ? 'Pause' : 'En cours',
        'avancement' => 48 + ($i * 6),
        'groupe_machine' => 'decoupe',
        'groupe_label' => 'Decoupe',
        'machine_decoupe' => 'Decoupe-' . str_pad((string) $i, 2, '0', STR_PAD_LEFT),
        'nombre_feuilles_decoupe' => 5400 + ($i * 180),
        'outil_decoupe' => 'OD-' . (80 + $i),
        'conditionnement' => $i % 2 === 0 ? 'Carton' : 'Cagette',
        'zone_stockage' => $zoneStockage,
        'ilot_chocolaterie' => $ilotChocolaterie,
    ];
}
for ($i = 1; $i <= 2; $i++) {
    $zoneStockage = $i === 1 ? 'Emballage' : 'Chocolaterie';
    $ilotChocolaterie = $zoneStockage === 'Chocolaterie' ? 'Ilot 9' : '';
    $thermoMachines[] = [
        'machine' => 'Illig-' . str_pad((string) $i, 2, '0', STR_PAD_LEFT),
        'tache_id' => $nextTask(),
        'etat' => 'En cours',
        'avancement' => 58 + ($i * 9),
        'groupe_machine' => 'illig',
        'groupe_label' => 'Illig',
        'machine_illig' => 'Illig-' . str_pad((string) $i, 2, '0', STR_PAD_LEFT),
        'nombre_feuilles_illig' => 5100 + ($i * 260),
        'type_carton' => $i === 1 ? 'Kraft double cannelure' : 'Carton premium',
        'feuilles_par_carton' => $i === 1 ? 120 : 100,
        'nombre_cartons' => $i === 1 ? 45 : 54,
        'conditionnement' => 'Carton',
        'zone_stockage' => $zoneStockage,
        'ilot_chocolaterie' => $ilotChocolaterie,
    ];
}

$services = [
    'Impression' => [
        [
            'machine' => 'Impr-01',
            'tache_id' => $nextTask(),
            'etat' => 'En cours',
            'avancement' => 55,
            'nombre_feuilles' => 2400,
            'type_feuille' => 'Offset 300g',
            'tableau_impression' => 'OD79',
            'masse_couleur' => '4.2 kg',
        ],
        [
            'machine' => 'Impr-02',
            'tache_id' => $nextTask(),
            'etat' => 'Pause',
            'avancement' => 32,
            'nombre_feuilles' => 1800,
            'type_feuille' => 'Couches brillante',
            'tableau_impression' => 'OD82',
            'masse_couleur' => '3.1 kg',
        ],
        [
            'machine' => 'Impr-03',
            'tache_id' => $nextTask(),
            'etat' => 'En cours',
            'avancement' => 71,
            'nombre_feuilles' => 3200,
            'type_feuille' => 'Kraft blanc',
            'tableau_impression' => 'OD88',
            'masse_couleur' => '5.0 kg',
        ],
        [
            'machine' => 'Impr-04',
            'tache_id' => $nextTask(),
            'etat' => 'Fini',
            'avancement' => 100,
            'nombre_feuilles' => 900,
            'type_feuille' => 'Offset 250g',
            'tableau_impression' => 'OD75',
            'masse_couleur' => '1.5 kg',
        ],
    ],
    'Thermoformage' => $thermoMachines,
    'Chocolaterie' => [
        [
            'machine' => 'Choco-Temp1',
            'tache_id' => $nextTask(),
            'etat' => 'En cours',
            'avancement' => 45,
            'type_chocolat' => 'Lait',
            'temperature' => '29 C',
            'nombre_feuilles' => 1600,
        ],
        [
            'machine' => 'Choco-Temp2',
            'tache_id' => $nextTask(),
            'etat' => 'En cours',
            'avancement' => 67,
            'type_chocolat' => 'Noir 70%',
            'temperature' => '31 C',
            'nombre_feuilles' => 1400,
        ],
        [
            'machine' => 'Enrobeuse',
            'tache_id' => $nextTask(),
            'etat' => 'Fini',
            'avancement' => 100,
            'type_chocolat' => 'Blanc',
            'temperature' => '28 C',
            'nombre_feuilles' => 1100,
        ],
    ],
    'Emballage' => [
        [
            'machine' => 'Pack-01',
            'tache_id' => $nextTask(),
            'etat' => 'En cours',
            'avancement' => 52,
            'nombre_boites' => 900,
            'nombre_feuilles_par_boite' => 8,
            'type_carton' => 'Carton kraft',
            'nombre_feuilles' => 7200,
            'nombre_cartons' => 75,
        ],
        [
            'machine' => 'Pack-02',
            'tache_id' => $nextTask(),
            'etat' => 'Pause',
            'avancement' => 20,
            'nombre_boites' => 520,
            'nombre_feuilles_par_boite' => 6,
            'type_carton' => 'Micro cannelure',
            'nombre_feuilles' => 3120,
            'nombre_cartons' => 45,
        ],
        [
            'machine' => 'Etiqueteuse',
            'tache_id' => $nextTask(),
            'etat' => 'En cours',
            'avancement' => 73,
            'nombre_boites' => 1100,
            'nombre_feuilles_par_boite' => 10,
            'type_carton' => 'Carton premium',
            'nombre_feuilles' => 11000,
            'nombre_cartons' => 98,
        ],
    ],
];

$extraTabs = [
    'Bureau' => 'bureau',
    'Statistiques' => 'statistiques',
];

$primaryFeuilleKey = [
    'Impression' => 'nombre_feuilles',
    'Chocolaterie' => 'nombre_feuilles',
    'Emballage' => 'nombre_feuilles',
];

$allMachines = [];
foreach ($services as $serviceName => $list) {
    foreach ($list as $machine) {
        $machine['service_name'] = $serviceName;
        $allMachines[] = $machine;
    }
}

$totalMachines = count($allMachines);
$totalFeuilles = 0;
foreach ($services as $serviceName => $list) {
    if ($serviceName === 'Thermoformage') {
        foreach ($list as $machine) {
            $totalFeuilles += (int) (
                $machine['nombre_feuilles_thermo']
                ?? $machine['nombre_feuilles_decoupe']
                ?? $machine['nombre_feuilles_illig']
                ?? 0
            );
        }
        continue;
    }
    $feuilleKey = $primaryFeuilleKey[$serviceName] ?? 'nombre_feuilles';
    foreach ($list as $machine) {
        $totalFeuilles += (int) ($machine[$feuilleKey] ?? 0);
    }
}
$thermoCount = count($services['Thermoformage']);
$impressionCount = count($services['Impression']);
$progressMoyen = round(array_sum(array_column($allMachines, 'avancement')) / max(1, $totalMachines));

$clientFields = [];
foreach ($serviceFields as $serviceName => $fields) {
    $clientFields[$serviceName] = array_map(
        function ($field) {
            $entry = [
                'key' => $field['key'],
                'label' => $field['label'],
                'type' => $field['type'] ?? 'text',
            ];
            if (isset($field['options'])) {
                $entry['options'] = $field['options'];
            }
            return $entry;
        },
        $fields
    );
}
$clientFieldsJson = json_encode($clientFields, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
if ($clientFieldsJson === false) {
    $clientFieldsJson = '{}';
}
?>
<header>
    <div class="hero">
        <div>
            <h1>Maquette de pilotage des ateliers</h1>
            <p>Vue rapide des services Impression, Thermoformage, Chocolaterie et Emballage avec edition directe des donnees.</p>
        </div>
        <div style="display:flex; flex-direction:column; gap:10px; align-items:flex-end; justify-content:center;">
            <span class="pill">4 services | maquette HTML/PHP</span>
            <span class="pill" style="background:#f9731614;">Sans base de donnees</span>
        </div>
    </div>
</header>

<main>
    <div class="tabs">
        <?php foreach ($services as $serviceName => $_): ?>
            <button class="tab-btn" data-tab="<?php echo h(slug($serviceName)); ?>"><?php echo h($serviceName); ?></button>
        <?php endforeach; ?>
        <?php foreach ($extraTabs as $label => $slugValue): ?>
            <button class="tab-btn" data-tab="<?php echo h($slugValue); ?>"><?php echo h($label); ?></button>
        <?php endforeach; ?>
    </div>

    <?php foreach ($services as $serviceName => $machines): ?>
        <?php $serviceSlug = slug($serviceName); ?>
        <section class="tab-panel" id="<?php echo h($serviceSlug); ?>">
            <div class="meta" style="margin-bottom:10px;">
                <span style="font-weight:700;">Service <?php echo h($serviceName); ?></span>
                <span><?php echo h(count($machines)); ?> lignes</span>
            </div>

            <?php if ($serviceName === 'Thermoformage'): ?>
                <div class="thermo-tools">
                    <div class="search-row">
                        <input type="text" class="search-input" id="task-search" placeholder="Recherche commande/tache (ex: 12654/26)">
                        <button type="button" class="btn secondary" id="task-clear">Effacer</button>
                        <span class="search-info" id="task-info"></span>
                    </div>
                    <div class="filter-row">
                        <button class="filter-btn" data-filter="all">Tous les groupes</button>
                        <button class="filter-btn" data-filter="thermo-g1">Thermo groupe 1 (6)</button>
                        <button class="filter-btn" data-filter="thermo-g2">Thermo groupe 2 (6)</button>
                        <button class="filter-btn" data-filter="decoupe">Decoupe (4)</button>
                        <button class="filter-btn" data-filter="illig">Illig (2)</button>
                    </div>
                </div>
            <?php endif; ?>

            <div class="grid<?php echo $serviceName === 'Thermoformage' ? ' thermo-grid' : ''; ?>">
                <?php foreach ($machines as $index => $machine): ?>
                    <?php
                        $etat = strtolower((string) ($machine['etat'] ?? ''));
                        $statusClass = $etat === 'en cours' ? 'encours' : ($etat === 'fini' ? 'fini' : 'pause');
                        $conditionnement = strtolower(trim((string) ($machine['conditionnement'] ?? '')));
                        $stockCagette = $conditionnement === 'cagette' ? 1 : 0;
                        $stockCarton = $conditionnement === 'carton' ? 1 : 0;
                        $rowJson = json_encode($machine, JSON_UNESCAPED_UNICODE | JSON_HEX_QUOT | JSON_HEX_APOS);
                        if ($rowJson === false) {
                            $rowJson = '{}';
                        }
                    ?>
                    <article
                        class="card machine-card"
                        data-service="<?php echo h($serviceName); ?>"
                        data-name="<?php echo h($machine['machine'] ?? ('Ligne ' . ($index + 1))); ?>"
                        data-group="<?php echo h($machine['groupe_machine'] ?? 'all'); ?>"
                        data-conditionnement="<?php echo h($machine['conditionnement'] ?? ''); ?>"
                        data-zone="<?php echo h($machine['zone_stockage'] ?? ''); ?>"
                        data-ilot="<?php echo h($machine['ilot_chocolaterie'] ?? ''); ?>"
                        data-cagette="<?php echo h($stockCagette); ?>"
                        data-carton="<?php echo h($stockCarton); ?>"
                        data-task="<?php echo h(format_tache((string) ($machine['tache_id'] ?? ''))); ?>"
                        data-row-json="<?php echo h($rowJson); ?>"
                    >
                        <div class="meta">
                            <h3><?php echo h($machine['machine'] ?? ('Ligne ' . ($index + 1))); ?></h3>
                            <span class="status <?php echo h($statusClass); ?>"><?php echo h($machine['etat'] ?? 'N/A'); ?></span>
                        </div>

                        <div class="chips">
                            <span class="chip">Tache #<?php echo h(format_tache((string) ($machine['tache_id'] ?? 'N/A'))); ?></span>
                            <?php if ($serviceName === 'Thermoformage' && !empty($machine['groupe_label'])): ?>
                                <span class="chip">Groupe : <?php echo h($machine['groupe_label']); ?></span>
                            <?php endif; ?>
                            <?php if ($serviceName === 'Thermoformage'): ?>
                                <span class="chip chip-stock">Stock : Cagette <?php echo h($stockCagette); ?> | Carton <?php echo h($stockCarton); ?></span>
                            <?php endif; ?>
                            <?php foreach ($serviceFields[$serviceName] as $field): ?>
                                <?php
                                    $key = $field['key'];
                                    $value = $machine[$key] ?? '';
                                    if ($value === '' || $value === null) {
                                        continue;
                                    }
                                ?>
                                <span class="chip chip-field" data-key="<?php echo h($key); ?>">
                                    <?php echo h($field['label']); ?> : <?php echo h($value); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>

                        <div class="progress">
                            <span style="width: <?php echo max(0, min(100, (int) ($machine['avancement'] ?? 0))); ?>%"></span>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <?php if ($serviceName === 'Thermoformage'): ?>
                <div class="storage-board" id="thermo-storage-board">
                    <h3 class="storage-title">Visuel de rangement - Thermoformage</h3>
                    <div class="storage-grid">
                        <div class="storage-zone">
                            <h4>Zone Emballage</h4>
                            <div id="storage-emballage"></div>
                        </div>
                        <div class="storage-divider"></div>
                        <div class="storage-zone">
                            <h4>Zone Chocolaterie</h4>
                            <div id="storage-chocolaterie"></div>
                            <p class="storage-subtitle">Ilots Chocolaterie</p>
                            <div class="ilot-grid" id="storage-ilots"></div>
                            <div class="ilot-detail" id="ilot-detail">
                                <div class="ilot-detail-head">
                                    <p class="ilot-detail-title" id="ilot-detail-title">Selectionnez un ilot</p>
                                    <span class="ilot-detail-summary" id="ilot-detail-summary"></span>
                                </div>
                                <div class="ilot-task-list" id="ilot-task-list"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    <?php endforeach; ?>

    <section class="tab-panel" id="bureau">
        <div class="meta" style="margin-bottom:10px;">
            <span style="font-weight:700;">Bureau</span>
            <span>Creation de tache (maquette)</span>
        </div>
        <div class="form-card">
            <div class="form-grid">
                <div class="form-group">
                    <label>ID tache</label>
                    <input type="text" placeholder="17355/26">
                </div>
                <div class="form-group">
                    <label>Service</label>
                    <select>
                        <option>Impression</option>
                        <option>Thermoformage</option>
                        <option>Chocolaterie</option>
                        <option>Emballage</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Machine</label>
                    <input type="text" placeholder="Nom machine">
                </div>
                <div class="form-group">
                    <label>Nombre de feuilles</label>
                    <input type="number" min="0" placeholder="0">
                </div>
                <div class="form-group">
                    <label>Etat</label>
                    <select>
                        <option>En cours</option>
                        <option>Pause</option>
                        <option>Fini</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Avancement %</label>
                    <input type="number" min="0" max="100" placeholder="0">
                </div>
            </div>
            <div class="modal-actions" style="margin-top:16px;">
                <button class="btn secondary" type="button">Reinitialiser</button>
                <button class="btn primary" type="button">Enregistrer (demo)</button>
            </div>
            <p class="note">Ce formulaire est visuel uniquement (pas de sauvegarde serveur).</p>
        </div>
    </section>

    <section class="tab-panel" id="statistiques">
        <div class="meta" style="margin-bottom:10px;">
            <span style="font-weight:700;">Statistiques</span>
            <span>Vue rapide des volumes</span>
        </div>
        <div class="grid">
            <article class="card">
                <div class="meta"><strong>Total lignes</strong><span>Unites</span></div>
                <h3 style="margin:4px 0;"><?php echo h($totalMachines); ?></h3>
                <p class="note">Tous services confondus</p>
            </article>
            <article class="card">
                <div class="meta"><strong>Total feuilles</strong><span>Feuilles</span></div>
                <h3 style="margin:4px 0;"><?php echo h(number_format($totalFeuilles, 0, ',', ' ')); ?></h3>
                <p class="note">Somme des feuilles planifiees</p>
            </article>
            <article class="card">
                <div class="meta"><strong>Thermoformage</strong><span>Lignes</span></div>
                <h3 style="margin:4px 0;"><?php echo h($thermoCount); ?></h3>
                <p class="note">2 groupes thermo (6+6), 4 decoupe, 2 Illig</p>
            </article>
            <article class="card">
                <div class="meta"><strong>Impression</strong><span>Lignes</span></div>
                <h3 style="margin:4px 0;"><?php echo h($impressionCount); ?></h3>
                <p class="note">Progression moyenne : <?php echo h($progressMoyen); ?>%</p>
            </article>
        </div>
    </section>
</main>

<footer>Maquette statique - modifiez les donnees dans le popup de chaque carte.</footer>

<div class="modal" id="edit-modal">
    <div class="modal-box">
        <h4 id="modal-title">Modifier la ligne</h4>
        <p id="modal-subtitle">Mettez a jour les champs du service.</p>
        <div class="form-grid" id="dynamic-fields"></div>
        <div class="modal-actions">
            <button class="btn secondary" id="btn-cancel" type="button">Annuler</button>
            <button class="btn primary" id="btn-save" type="button">Mettre a jour</button>
        </div>
    </div>
</div>

<div class="toast" id="toast"></div>

<script>
const buttons = document.querySelectorAll('.tab-btn');
const panels = document.querySelectorAll('.tab-panel');
const fieldDefinitions = <?php echo $clientFieldsJson; ?>;

const modal = document.getElementById('edit-modal');
const modalTitle = document.getElementById('modal-title');
const modalSubtitle = document.getElementById('modal-subtitle');
const dynamicFields = document.getElementById('dynamic-fields');
const btnCancel = document.getElementById('btn-cancel');
const btnSave = document.getElementById('btn-save');
const toast = document.getElementById('toast');
const searchInput = document.getElementById('task-search');
const searchClear = document.getElementById('task-clear');
const searchInfo = document.getElementById('task-info');
const allCards = Array.from(document.querySelectorAll('.machine-card'));

const thermoPanel = document.getElementById('thermoformage');
const thermoFilterButtons = thermoPanel ? thermoPanel.querySelectorAll('.filter-btn') : [];
const thermoCards = thermoPanel ? Array.from(thermoPanel.querySelectorAll('.machine-card')) : [];
const ilotTarget = document.getElementById('storage-ilots');
const ilotDetailTitle = document.getElementById('ilot-detail-title');
const ilotDetailSummary = document.getElementById('ilot-detail-summary');
const ilotTaskList = document.getElementById('ilot-task-list');

let currentCard = null;
let currentRow = {};
let currentFields = [];
let currentService = '';
let toastTimer = null;
let currentThermoFilter = 'all';
let currentTaskQuery = '';
let selectedIlot = '';

function activateTab(target) {
    buttons.forEach((btn) => btn.classList.toggle('active', btn.dataset.tab === target));
    panels.forEach((panel) => panel.classList.toggle('active', panel.id === target));
}

buttons.forEach((btn, index) => {
    btn.addEventListener('click', () => activateTab(btn.dataset.tab));
    if (index === 0) {
        activateTab(btn.dataset.tab);
    }
});

function parseRowJson(card) {
    try {
        return JSON.parse(card.dataset.rowJson || '{}');
    } catch (error) {
        return {};
    }
}

function updateCardRowJson(card, updater) {
    const row = parseRowJson(card);
    updater(row);
    card.dataset.rowJson = JSON.stringify(row);
}

function upsertChip(card, key, label, value) {
    const chips = card.querySelector('.chips');
    if (!chips) return;
    let chip = chips.querySelector('.chip-field[data-key="' + key + '"]');
    const hasValue = value !== null && value !== undefined && String(value).trim() !== '';
    if (!hasValue) {
        if (chip) chip.remove();
        return;
    }
    if (!chip) {
        chip = document.createElement('span');
        chip.className = 'chip chip-field';
        chip.dataset.key = key;
        chips.appendChild(chip);
    }
    chip.textContent = label + ' : ' + value;
}

function parseCount(value) {
    const parsed = Number.parseInt(String(value || '0'), 10);
    return Number.isNaN(parsed) ? 0 : Math.max(0, parsed);
}

function getCardStocks(card) {
    return {
        cagette: parseCount(card.dataset.cagette),
        carton: parseCount(card.dataset.carton),
    };
}

function syncCardStockChip(card) {
    const chips = card.querySelector('.chips');
    if (!chips) return;
    let chip = chips.querySelector('.chip-stock');
    if (!chip) {
        chip = document.createElement('span');
        chip.className = 'chip chip-stock';
        chips.appendChild(chip);
    }
    const stock = getCardStocks(card);
    chip.textContent = 'Stock : Cagette ' + stock.cagette + ' | Carton ' + stock.carton;
}

function deriveConditionnementFromStock(cagette, carton) {
    if (cagette > 0 && carton > 0) return 'Mixte';
    if (carton > 0) return 'Carton';
    if (cagette > 0) return 'Cagette';
    return 'Aucun';
}

function setCardStocks(card, cagetteCount, cartonCount) {
    const cagette = Math.max(0, Number(cagetteCount) || 0);
    const carton = Math.max(0, Number(cartonCount) || 0);
    const conditionnement = deriveConditionnementFromStock(cagette, carton);

    card.dataset.cagette = String(cagette);
    card.dataset.carton = String(carton);
    card.dataset.conditionnement = conditionnement;
    syncCardStockChip(card);
    upsertChip(card, 'conditionnement', 'Conditionnement', conditionnement === 'Aucun' ? '' : conditionnement);

    updateCardRowJson(card, (row) => {
        row.stock_cagette = cagette;
        row.stock_carton = carton;
        row.conditionnement = conditionnement;
    });
}

function initializeThermoStocks() {
    thermoCards.forEach((card) => {
        const row = parseRowJson(card);
        let cagette = parseCount(card.dataset.cagette);
        let carton = parseCount(card.dataset.carton);

        if (Number.isInteger(row.stock_cagette)) cagette = parseCount(row.stock_cagette);
        if (Number.isInteger(row.stock_carton)) carton = parseCount(row.stock_carton);

        if (cagette === 0 && carton === 0) {
            const cond = String(card.dataset.conditionnement || '').toLowerCase();
            if (cond === 'carton') carton = 1;
            if (cond === 'cagette') cagette = 1;
        }

        setCardStocks(card, cagette, carton);
    });
}

function buildFieldControl(field, value) {
    const group = document.createElement('div');
    group.className = 'form-group';

    const label = document.createElement('label');
    label.textContent = field.label;
    label.setAttribute('for', 'field-' + field.key);
    group.appendChild(label);

    let control;
    if (field.type === 'select') {
        control = document.createElement('select');
        const options = Array.isArray(field.options) ? field.options : [];
        options.forEach((item) => {
            const option = document.createElement('option');
            option.value = item;
            option.textContent = item;
            control.appendChild(option);
        });
        if (value && !options.includes(String(value))) {
            const unknownOption = document.createElement('option');
            unknownOption.value = String(value);
            unknownOption.textContent = String(value);
            control.appendChild(unknownOption);
        }
        control.value = value || options[0] || '';
    } else {
        control = document.createElement('input');
        control.type = field.type === 'number' ? 'number' : 'text';
        if (field.type === 'number') {
            control.min = '0';
            control.step = '1';
        }
        control.value = value ?? '';
    }

    control.id = 'field-' + field.key;
    control.name = field.key;
    control.dataset.fieldType = field.type || 'text';
    group.appendChild(control);

    return group;
}

function openModal(card) {
    currentCard = card;
    currentRow = parseRowJson(card);
    currentService = card.dataset.service || '';
    currentFields = fieldDefinitions[currentService] || [];

    const cardName = card.dataset.name || 'Machine';
    modalTitle.textContent = 'Modifier ' + cardName;
    modalSubtitle.textContent = 'Service : ' + currentService;

    dynamicFields.innerHTML = '';
    currentFields.forEach((field) => {
        const value = currentRow[field.key] ?? '';
        dynamicFields.appendChild(buildFieldControl(field, value));
    });

    modal.classList.add('active');
    const firstControl = dynamicFields.querySelector('input, select');
    if (firstControl) firstControl.focus();
}

function closeModal() {
    modal.classList.remove('active');
    dynamicFields.innerHTML = '';
    currentCard = null;
    currentRow = {};
    currentFields = [];
    currentService = '';
}

function normalizeValue(rawValue, fieldType) {
    if (fieldType === 'number') {
        const trimmed = String(rawValue || '').trim();
        if (trimmed === '') return '';
        const parsed = Number(trimmed);
        return Number.isNaN(parsed) ? '' : parsed;
    }
    return String(rawValue || '').trim();
}

function showToast(message) {
    toast.textContent = message;
    toast.classList.add('show');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => {
        toast.classList.remove('show');
    }, 2400);
}

function normalizeTask(value) {
    return String(value || '').toLowerCase().replace(/\s+/g, '');
}

function taskMatch(taskValue, queryValue) {
    const task = normalizeTask(taskValue);
    const query = normalizeTask(queryValue);
    if (!query) return true;
    if (task.includes(query)) return true;
    return task.replace('/', '').includes(query.replace('/', ''));
}

function applyFilters() {
    let matchCount = 0;
    let firstMatch = null;

    allCards.forEach((card) => {
        let visible = true;
        const isThermoCard = (card.dataset.service || '') === 'Thermoformage';
        if (isThermoCard && currentThermoFilter !== 'all') {
            visible = (card.dataset.group || '') === currentThermoFilter;
        }
        if (isThermoCard && visible && currentTaskQuery && !taskMatch(card.dataset.task || '', currentTaskQuery)) {
            visible = false;
        }
        card.style.display = visible ? '' : 'none';
        if (isThermoCard && visible && currentTaskQuery) {
            matchCount++;
            if (!firstMatch) {
                firstMatch = card;
            }
        }
    });

    if (searchInfo) {
        searchInfo.textContent = currentTaskQuery ? (matchCount + ' resultat(s)') : '';
    }

    if (currentTaskQuery && firstMatch) {
        const panel = firstMatch.closest('.tab-panel');
        if (panel && !panel.classList.contains('active')) {
            activateTab(panel.id);
        }
    }
}

function renderStorageZone(container, stats, maxValue) {
    if (!container) return;
    const cagette = stats.Cagette || 0;
    const carton = stats.Carton || 0;
    const total = cagette + carton;
    const cagettePercent = maxValue > 0 ? Math.round((cagette / maxValue) * 100) : 0;
    const cartonPercent = maxValue > 0 ? Math.round((carton / maxValue) * 100) : 0;

    container.innerHTML = ''
        + '<div class="stock-line"><span>Cagettes</span><span class="stock-track"><span class="stock-fill" style="width:' + cagettePercent + '%"></span></span><strong>' + cagette + '</strong></div>'
        + '<div class="stock-line"><span>Cartons</span><span class="stock-track"><span class="stock-fill" style="width:' + cartonPercent + '%"></span></span><strong>' + carton + '</strong></div>'
        + '<div class="stock-line"><span>Total unites</span><span class="stock-track"><span class="stock-fill" style="width:100%"></span></span><strong>' + total + '</strong></div>';
}

function getCardsByIlot(ilotName) {
    return thermoCards
        .filter((card) => (card.dataset.zone || '') === 'Chocolaterie' && (card.dataset.ilot || '') === ilotName)
        .sort((a, b) => String(a.dataset.task || '').localeCompare(String(b.dataset.task || ''), 'fr'));
}

function renderIlotDetail(ilotName) {
    if (!ilotDetailTitle || !ilotDetailSummary || !ilotTaskList) return;

    if (!ilotName) {
        ilotDetailTitle.textContent = 'Selectionnez un ilot';
        ilotDetailSummary.textContent = '';
        ilotTaskList.innerHTML = '<div class="ilot-task-item"><div class="ilot-task-stock">Aucune tache selectionnee.</div></div>';
        return;
    }

    const cards = getCardsByIlot(ilotName);
    if (cards.length === 0) {
        ilotDetailTitle.textContent = 'Taches de ' + ilotName;
        ilotDetailSummary.textContent = '0 tache';
        ilotTaskList.innerHTML = '<div class="ilot-task-item"><div class="ilot-task-stock">Aucune tache dans cet ilot.</div></div>';
        return;
    }

    let totalCagette = 0;
    let totalCarton = 0;
    cards.forEach((card) => {
        const stock = getCardStocks(card);
        totalCagette += stock.cagette;
        totalCarton += stock.carton;
    });

    ilotDetailTitle.textContent = 'Taches de ' + ilotName;
    ilotDetailSummary.textContent = cards.length + ' tache(s) | Cagettes: ' + totalCagette + ' | Cartons: ' + totalCarton;

    ilotTaskList.innerHTML = cards.map((card) => {
        const stock = getCardStocks(card);
        const taskId = String(card.dataset.task || '');
        const machine = String(card.dataset.name || 'Machine');
        return ''
            + '<div class="ilot-task-item" data-task="' + taskId + '">'
            + '  <div class="ilot-task-head">'
            + '      <span class="ilot-task-id">Tache ' + taskId + '</span>'
            + '      <span class="ilot-task-machine">' + machine + '</span>'
            + '  </div>'
            + '  <div class="ilot-task-stock">Stock actuel: Cagette ' + stock.cagette + ' | Carton ' + stock.carton + '</div>'
            + '  <div class="task-actions">'
            + '      <button type="button" class="task-btn" data-action="add-cagette" data-task="' + taskId + '">+ Cagette</button>'
            + '      <button type="button" class="task-btn" data-action="remove-cagette" data-task="' + taskId + '">- Cagette</button>'
            + '      <button type="button" class="task-btn" data-action="add-carton" data-task="' + taskId + '">+ Carton</button>'
            + '      <button type="button" class="task-btn" data-action="remove-carton" data-task="' + taskId + '">- Carton</button>'
            + '      <button type="button" class="task-btn danger" data-action="clear-task" data-task="' + taskId + '">Prendre tout</button>'
            + '  </div>'
            + '</div>';
    }).join('');
}

function renderThermoStorageVisual() {
    const emballageTarget = document.getElementById('storage-emballage');
    const chocoTarget = document.getElementById('storage-chocolaterie');
    if (!emballageTarget || !chocoTarget || !ilotTarget) return;

    const zones = {
        Emballage: { Cagette: 0, Carton: 0 },
        Chocolaterie: { Cagette: 0, Carton: 0 },
    };
    const ilots = {};

    thermoCards.forEach((card) => {
        const zone = card.dataset.zone === 'Chocolaterie' ? 'Chocolaterie' : 'Emballage';
        const stock = getCardStocks(card);
        zones[zone].Cagette += stock.cagette;
        zones[zone].Carton += stock.carton;

        if (zone === 'Chocolaterie') {
            const ilotName = (card.dataset.ilot || '').trim() || 'Ilot non defini';
            if (!ilots[ilotName]) {
                ilots[ilotName] = { Cagette: 0, Carton: 0, tasks: 0 };
            }
            ilots[ilotName].Cagette += stock.cagette;
            ilots[ilotName].Carton += stock.carton;
            ilots[ilotName].tasks += 1;
        }
    });

    const maxCount = Math.max(
        1,
        zones.Emballage.Cagette,
        zones.Emballage.Carton,
        zones.Chocolaterie.Cagette,
        zones.Chocolaterie.Carton
    );
    renderStorageZone(emballageTarget, zones.Emballage, maxCount);
    renderStorageZone(chocoTarget, zones.Chocolaterie, maxCount);

    const ilotNames = Object.keys(ilots).sort((a, b) => a.localeCompare(b, 'fr'));
    if (ilotNames.length === 0) {
        selectedIlot = '';
        ilotTarget.innerHTML = '<div class="ilot-card"><p class="ilot-name">Aucun ilot</p><p class="ilot-stat">Pas de stockage Chocolaterie</p></div>';
        renderIlotDetail('');
        return;
    }
    if (!selectedIlot || !ilotNames.includes(selectedIlot)) {
        selectedIlot = ilotNames[0];
    }

    ilotTarget.innerHTML = ilotNames.map((name) => {
        const stats = ilots[name];
        const activeClass = name === selectedIlot ? ' active' : '';
        return ''
            + '<button type="button" class="ilot-card ilot-btn' + activeClass + '" data-ilot-name="' + name + '">'
            + '<p class="ilot-name">' + name + '</p>'
            + '<p class="ilot-stat">Taches : ' + stats.tasks + '</p>'
            + '<p class="ilot-stat">Cagettes : ' + stats.Cagette + '</p>'
            + '<p class="ilot-stat">Cartons : ' + stats.Carton + '</p>'
            + '</button>';
    }).join('');

    ilotTarget.querySelectorAll('.ilot-btn').forEach((button) => {
        button.addEventListener('click', () => {
            selectedIlot = button.dataset.ilotName || '';
            renderThermoStorageVisual();
        });
    });

    renderIlotDetail(selectedIlot);
}

function findThermoCardByTask(taskId) {
    const normalized = normalizeTask(taskId);
    return thermoCards.find((card) => normalizeTask(card.dataset.task || '') === normalized) || null;
}

function updateTaskStock(taskId, action) {
    const card = findThermoCardByTask(taskId);
    if (!card) return;
    const stock = getCardStocks(card);

    if (action === 'add-cagette') setCardStocks(card, stock.cagette + 1, stock.carton);
    if (action === 'remove-cagette') setCardStocks(card, Math.max(0, stock.cagette - 1), stock.carton);
    if (action === 'add-carton') setCardStocks(card, stock.cagette, stock.carton + 1);
    if (action === 'remove-carton') setCardStocks(card, stock.cagette, Math.max(0, stock.carton - 1));
    if (action === 'clear-task') setCardStocks(card, 0, 0);

    applyFilters();
    renderThermoStorageVisual();
}

allCards.forEach((card) => {
    card.addEventListener('click', () => openModal(card));
});

if (ilotTaskList) {
    ilotTaskList.addEventListener('click', (event) => {
        const button = event.target.closest('.task-btn');
        if (!button) return;
        const taskId = button.dataset.task || '';
        const action = button.dataset.action || '';
        if (!taskId || !action) return;
        updateTaskStock(taskId, action);
        const actionLabel = action === 'clear-task' ? 'Stock retire' : 'Stock mis a jour';
        showToast(actionLabel + ' pour la tache ' + taskId + '.');
    });
}

btnCancel.addEventListener('click', closeModal);
modal.addEventListener('click', (event) => {
    if (event.target === modal) closeModal();
});
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && modal.classList.contains('active')) {
        closeModal();
    }
});

btnSave.addEventListener('click', () => {
    if (!currentCard || !currentService) return;

    currentFields.forEach((field) => {
        const control = dynamicFields.querySelector('[name="' + field.key + '"]');
        if (!control) return;
        const nextValue = normalizeValue(control.value, field.type || 'text');
        currentRow[field.key] = nextValue;

        if (field.key === 'conditionnement') {
            const currentStock = getCardStocks(currentCard);
            if (String(nextValue).toLowerCase() === 'carton') {
                setCardStocks(currentCard, 0, Math.max(1, currentStock.carton));
            } else if (String(nextValue).toLowerCase() === 'cagette') {
                setCardStocks(currentCard, Math.max(1, currentStock.cagette), 0);
            } else {
                setCardStocks(currentCard, currentStock.cagette, currentStock.carton);
            }
            return;
        }

        upsertChip(currentCard, field.key, field.label, nextValue);
        updateCardRowJson(currentCard, (row) => {
            row[field.key] = nextValue;
        });
    });

    updateCardRowJson(currentCard, (row) => {
        Object.keys(currentRow).forEach((key) => {
            row[key] = currentRow[key];
        });
    });
    closeModal();
    showToast('Donnees mises a jour pour ' + currentService + '.');
    applyFilters();
    renderThermoStorageVisual();
});

if (thermoFilterButtons.length > 0) {
    thermoFilterButtons.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            currentThermoFilter = btn.dataset.filter || 'all';
            thermoFilterButtons.forEach((item) => {
                item.classList.toggle('active', item === btn);
            });
            applyFilters();
        });
        if (index === 0) {
            btn.classList.add('active');
        }
    });
}

if (searchInput) {
    searchInput.addEventListener('input', () => {
        currentTaskQuery = searchInput.value.trim();
        applyFilters();
    });
}

if (searchClear) {
    searchClear.addEventListener('click', () => {
        if (!searchInput) return;
        searchInput.value = '';
        currentTaskQuery = '';
        applyFilters();
        searchInput.focus();
    });
}

initializeThermoStocks();
applyFilters();
renderThermoStorageVisual();
</script>
</body>
</html>
