-- 1 Contare quanti iscritti ci sono stati ogni anno

		SELECT COUNT(`id`) AS 'numero_iscritti', YEAR(`enrolment_date`) AS 'anno_iscrizione'
		FROM `students`
		GROUP BY YEAR(`enrolment_date`);


-- 2 Contare gli insegnanti che hanno l'ufficio nello stesso edificio

		SELECT COUNT(`id`) AS 'numero_insegnanti_ufficio_stessa_sede', `office_address`
		FROM `teachers`
		GROUP BY `office_address`;


-- 3 Calcolare la media dei voti di ogni appello d'esame

		SELECT AVG(`vote`) AS 'media_voto_esame', `exam_id`
		FROM `exam_student`
		GROUP BY `exam_id`;


-- 4 Contare quanti corsi di laurea ci sono per ogni dipartimento

		SELECT COUNT(`id`) AS 'numero_corsi_per_dipartimento', `department_id`
		FROM `degrees`
		GROUP BY `department_id`;