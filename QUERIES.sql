-- Selezionare tutti gli studenti nati nel 1990 (160)
SELECT `date_of_birth`, `name`, `surname`
FROM `students`
WHERE `date_of_birth`LIKE '1990%';


-- Selezionare tutti i corsi che valgono più di 10 crediti (479)
SELECT `cfu`, `name`
FROM `courses`
WHERE `cfu` > 10;


-- Selezionare tutti gli studenti che hanno più di 30 anni
SELECT `name`, `surname`, `date_of_birth`
FROM `students`
WHERE `date_of_birth` < DATE_SUB(CURRENT_DATE() - INTERVAL 31 YEAR);


-- Selezionare tutti i corsi del primo semestre del primo anno di un qualsiasi corso di laurea (286)
SELECT `name`, `year`, `period`
FROM `courses`
WHERE `year` = 1 AND `period` LIKE 'II%';


-- Selezionare tutti gli appelli d'esame che avvengono nel pomeriggio (dopo le 14) del 20/06/2020 (21)
SELECT `date`, `hour`
FROM `exams`
WHERE `hour` > '14:00:00' AND `date` = '2020-06-20';


-- Selezionare tutti i corsi di laurea magistrale (38)
SELECT `name`, `level`
FROM `degrees`
WHERE `name` LIKE '%magistrale%';



-- Da quanti dipartimenti è composta l'università? (12)
SELECT COUNT(`id`) AS 'tot_departments'
FROM `departments`;


-- Quanti sono gli insegnanti che non hanno un numero di telefono? (50)
SELECT COUNT(`id`) AS 'prof_no_phone'
FROM `teachers`
WHERE `phone` IS NULL;