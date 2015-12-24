/*
insert table user
*/
insert into user(id_user, username, password) values
(1, 'juan', 'juan'),
(2, 'leonardo', 'leonardo'),
(3, 'rudy', 'rudy');

/*
insert table rol
*/

insert into rol(id_rol, name_rol) values
(1, 'admin'),
(2, 'rol2'),
(3, 'rol3');

/*
insert table user_rol
*/
insert into user_rol(id_user_rol, user_id_user, rol_id_rol) values
(1, 1, 1),
(2, 2, 2);

/*
insert table form
*/
insert into form(id_form, name_form, url_form) values
(1, 'Registar Usuario', 'user/create'),
(2, 'Registar Rol', 'rol/create'),
(3, 'Registar Usuario Rol', 'userRol/create'),
(4, 'Registar Formulario', 'form/create'),
(5, 'Registar Rol Formulario', 'rolForm/create');

/*
insert table rol_form
*/
insert into rol_form(id_rol_form, rol_id_rol, form_id_form) values
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5);
