-- 1 Selezionare tutti gli studenti iscritti al Corso di Laurea in Economia

		-- mi ricavo l'ID del corso di Laurea in Economia
		SELECT `id`, `name`
		FROM `degrees`
		WHERE `name` = 'corso di laurea in economia';

		-- con l'ID posso scartare gli studenti iscritti ad altri corsi
		SELECT `students`.`name`, `students`.`surname`, `degrees`.`name`
		FROM `students`
		INNER JOIN `degrees` ON `degrees`.`id` = `students`.`degree_id`
		WHERE `students`.`degree_id` = 53;

-- 2 Selezionare tutti i Corsi di Laurea del Dipartimento di Neuroscienze

		-- mi ricavo l'ID del dipartimento di neuroscienze
		SELECT `id`, `name`
		FROM `departments`
		WHERE `name` LIKE '%neuroscienze';

		-- con l'ID posso selezionare tutti i corsi del dipartimento
		SELECT `departments`.`name`, `degrees`.`name`
		FROM `departments`
		INNER JOIN `degrees` ON `degrees`.`department_id` = `departments`.`id`
		WHERE `departments`.`id` = 7;


-- 3 Selezionare tutti i corsi in cui insegna Fulvio Amato (id=44)

		-- mi ricavo l'ID del professore
		SELECT `id`, `name`, `surname`
		FROM `teachers`
		WHERE `name` = 'fulvio' AND `surname` = 'amato';

		-- con l'ID adesso posso cercare in quali corsi insegni
		SELECT `courses`.`name` AS 'nome_corso', `teachers`.`name` AS 'nome_professore', `teachers`.`surname` AS 'cognome_professore'
		FROM `courses`
		INNER JOIN `course_teacher` ON `courses`.`id` = `teacher_id`
		INNER JOIN `teachers` ON `course_teacher`.`teacher_id` = `teachers`.`id`
		WHERE `teacher_id` = 44;


-- 4 Selezionare tutti gli studenti con i dati relativi al corso di laurea a cui sono iscritti e il relativo dipartimento, in ordine alfabetico per cognome e nome

		SELECT `students`.`name`, `students`.`surname`, `degrees`.`name`, `degrees`.`level`, `departments`.`name`
		FROM `students`
		INNER JOIN `degrees` ON `degrees`.`id` = `students`.`degree_id`
		INNER JOIN `departments` ON `departments`.`id` = `degrees`.`department_id`
		ORDER BY `students`.`name`, `students`.`surname` ASC;
