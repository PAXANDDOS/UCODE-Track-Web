USE ucode_web;

SELECT heroes.id, heroes.name, SUM(powers.points) AS points
FROM heroes
       JOIN powers ON powers.hero_id = heroes.id
GROUP BY heroes.id
ORDER BY points DESC
LIMIT 1;

SELECT heroes.name, powers.points
FROM heroes
       JOIN powers on powers.hero_id = heroes.id
WHERE powers.points = (SELECT min(powers.points) FROM powers)
LIMIT 1;

SELECT teams.hero_id, heroes.name, teams.name, SUM(powers.points) AS points
FROM heroes
       JOIN powers ON powers.hero_id = heroes.id
              JOIN teams ON teams.hero_id = heroes.id
WHERE teams.name = 'Avengers'
GROUP BY teams.hero_id
ORDER BY points DESC;

SELECT teams.name, SUM(powers.points) AS points
FROM heroes
       JOIN powers ON powers.hero_id = heroes.id
              JOIN teams ON teams.hero_id = heroes.id
GROUP BY teams.name
ORDER BY points;