USE ucode_web;

INSERT INTO `powers` (hero_id, name, points, type)
VALUES ( 1, 'iron shield', 200, 'defense');

INSERT INTO `powers` (hero_id, name, points, type)
VALUES ( 2, 'bloody fist', 110, 'attack');

INSERT INTO `races` (hero_id, name)
VALUES ( 1, 'Human');

INSERT INTO `races` (hero_id, name)
VALUES ( 2, 'Kree');

INSERT INTO `teams` (hero_id, name)
VALUES ( 1, 'Avengers');

INSERT INTO `teams` (hero_id, name)
VALUES ( 2, 'Hydra');