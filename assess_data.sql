DELETE FROM `colleges`;
DELETE FROM `college_programs`;
DELETE FROM`courses`;
DELETE FROM `users`;

INSERT INTO `colleges` (`id`, `code`, `name`) VALUES
(1, 'CAS', 'College of Arts and Sciences'),
(2, 'COFED', 'College of Education'),
(3, 'CME', 'College of Management and Entrepreneurship');


INSERT INTO `college_programs` (`id`, `code`, `name`, `college_id`) VALUES
(1, 'BSIT', 'Bachelor of Science in Information Technology', 1),
(2, 'BSSW', 'Bachelor of Science in Social Work', 1),
(3, 'APCOM', 'Bachelor of Science in Arts in Communication', 1),
(4, 'AB POSCI', 'Bachelor of Arts in Political Science', 1),
(5, 'BEED', 'Bachelor of Science in Elementary Education', 2),
(6, 'BSED', 'Bachelor of Science in Secondary Education', 2),
(7, 'BSPED', 'Bachelor of Science in Special Education', 2),
(8, 'BSTM', 'Bachelor of Science in Tourism Management', 3),
(9, 'BSHM', 'Bachelor of Science in Hospitality Management', 3),
(10, 'BSEntrep', 'Bachelor of Science in Entrepreneurship',3);


INSERT INTO `courses` (`id`, `code`, `name`, `program_id`, `college_id`) VALUES
(  1  , 'IT_206', 'IT Fundamentals',   1  ,  1   ),
(  2  , 'IT_146', 'Database Management System',   1  ,  1   ),
(  3  , 'IT_484', 'Web Development',   1  ,  1   ),
(  4  , 'IT_187', 'Data Structures',   1  ,  1   ),
(  5  , 'IT_385', 'System Analysis and Design',   1  ,  1   ),
(  6  , 'BSED_160', 'Principles of Teaching',   6  ,  2   ),
(  7  , 'BSED_490', 'Facilitating Learning',   6  ,  2   ),
(  8  , 'BSED_457', 'Assessment and Student Learning',   6  ,  2   ),
(  9  , 'BSED_130', 'Social Dimensions of Education',   6  ,  2   ),
(  10  , 'BSTM_453', 'Total Quality Management',   8  ,  3   ),
(  11  , 'BSTM_163', 'Food and Beverage Service Procedures',   8  ,  3   ),
(  12  , 'BSTM_294', 'Tourism Planning and Development',   8  ,  3   );

INSERT INTO `users` (`id`, `username`, `password`, `user_type`) VALUES
(1, 'admin', '123123123', 'admin');



