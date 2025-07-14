create or replace view v_liste_objets_emprunt
as select emprunt.id_objet as obj_emp, emprunt.date_emprunt, emprunt.date_retour, objet.* from emprunt 
join objet on emprunt.id_objet= objet.id_objet;