USE CAASis_NATIONAL_DB;

INSERT INTO statut (statut_name) 
	VALUES 	('Student'),
			('Student Desk Member'),
			('Employee');

INSERT INTO location (location_name) 
	VALUES 	('Aix-en-Provence'),
			('Angoulême'),
			('Arras'),
			('Bordeaux'),
			('Brest'),
			('Caen'),
			('Châteauroux'),
			('Dijon'),
			('Grenoble'),
			('La rochelle'),
			('Le Mans'),
			('Lille'),
			('Lyon'),
			('Lyon'),
			('Montpellier'),
			('Nancy'),
			('Nantes'),
			('Nice'),
			('Orléans'),
			('Paris Nanterre'),
			('Pau'),
			('Reims'),
			('Rouen'),
			('Saint-Nazaire'),
			('Strasbourg'),
			('Toulouse');

INSERT INTO member (member_name, member_firstname, member_email, member_password, id_location, id_statut) 
	VALUES 	('ARCELIN','Felix','felix.arcelin@viacesi.fr','5lWmkbjMSs','3','1'),


			('BARDIN','Sébastien','sebastien.bardin@viacesi.fr','TXKeYuAn5p','3','2'),


			('BEARD','Aymeric','aymeric.beard@viacesi.fr','j5aOmRZlP4','3','1'),
			('BIASSE','Mathieu','mathieu.biasse@viacesi.fr','i6noamxx6x','3','1'),
			('BRIAUX','Henry','henry.briaux@viacesi.fr','EDbp7KJ6xD','3','1'),
			('CLEMENT','Thomas','thomas.clement@viacesi.fr','t1B0Ytl3L2','3','1'),
			('DECROIX','Gael','gael.decroix@viacesi.fr','5qAxeOZ6zV','3','1'),

			
			('DEMOL','Adrien','adrien.demol@viacesi.fr','N77YPycvwg','3','2'),


			('DERUY','Louis','louis.deruy@viacesi.fr','wtItDggAlW','3','1'),
			('DESRAMAUT','Antoine','antoine.desramaut@viacesi.fr','qp9vrJEF42','3','1'),
			('DEVOYE','Hugo','hugo.devoye@viacesi.fr','TXKeYuAn5p','3','1'),
			('DHENNIN','Vincent','vincent.dhennin@viacesi.fr','j5aOmRZlP4','3','1'),


			('FIAND','Adrien','adrien.fiand@viacesi.fr','i6noamxx6x','3','2'),


			('FICOT','Paul','paul.ficot@viacesi.fr','EDbp7KJ6xD','3','1'),
			('KERGOAT','Thomas','thomas.kergoat@viacesi.fr','t1B0Ytl3L2','3','1'),
			('LAMBEC','Nathan','nathan.lambec@viacesi.fr','5qAxeOZ6zV','3','1'),
			('LANSEL','Dorian','dorian.lansel@viacesi.fr','N77YPycvwg','3','1'),
			('LEDRU','Louis','louis.ledru@viacesi.fr','wtItDggAlW','3','1'),
			('MANIEZ','Simon','simon.maniez@viacesi.fr','qp9vrJEF42','3','1'),
			('MONDOT','Antoine','antoine.mondot@viacesi.fr','5qAxeOZ6zV','3','1'),


			('MOREL','Charles','charles.morel@viacesi.fr','N77YPycvwg','3','2'),


			('MORGAND','Jules','jules.morgand@viacesi.fr','wtItDggAlW','3','1'),
			('SAUVAGE','Axel','axel.sauvage@viacesi.fr','qp9vrJEF42','3','1'),
			

			('BARBET','Stéphanie','*','qp9vrJEF42','3','3'),
			('BRUNELOT','Romain','*','N77YPycvwg','3','3'),
			('DELALIN','Hugue','*','5qAxeOZ6zV','3','3'),
			('HOCQUET','Jean-François','*','qp9vrJEF42','3','3'),
			('KOLOS','Ludivine','*','qp9vrJEF42','3','3'),
			('PRUSSEL','Loïc','*','wtItDggAlW','3','3'),
			('RAMON','Sébastien','*','qp9vrJEF42','3','3');



USE CAASis_LOCAL_ARRAS_DB;

INSERT INTO manifestation(manifestation_name, manifestation_description, manifestation_recurrency, manifestation_frequency, manifestation_price, manifestation_date, manifestation_is_idea, id_member_plan, id_member_approbator, id_member_suggest)
	VALUES	('Intégration','Dès la rentrée une première soirée au bar l\'Annexe, situé près du lycée Baudimont nous aurons l\'occasion de faire connaissance et de bénéficier des prix spécialement proposé pour nous par l\'Annexe prix moyen d\'une boisson 3€',FALSE, '0', '3', '2018-09-20', FALSE, '2', NULL, NULL),
			('Soirée bar','Chaque premier Jeudi du mois une soirée a lieu bar l\'Annexe, situé près du lycée Baudimont, l\'occasion de ce détendre et d\'oublier le CTTL du matin à l\'Annexe le prix moyen d\'une boisson 3€',TRUE, '28', '3', '2018-10-04', FALSE, '8', '25', NULL),
			('Soirée bar & billard','Chaque troisème Jeudi du mois une soirée a lieu bar le Pirate à Hénin Beaumont, dans un décord bateau de pirate venez boire un coup autour d\'un billard',TRUE, '28', '5', '2019-01-17',FALSE, '8', NULL, '1'),
			('Stranger CESI things','Exia role propose une après midi jeux en mode "Stranger Things", au programme fermeture de la brèche ouverte dans la caféteria et combat contre le Demogorgon',FALSE, '0', '0', '2019-01-30',FALSE, '13', '26', '7'),
			('Bool-ing','A la base on était partit sur une soirée Bowling World d\'Arras mais bon ... Faute de budget on à prit une Wii et Wii sport après tout avec les boolean on peut un faire un bowling non ? Strike ou pas stike !',FALSE, '0', '3', '2019-02-18', FALSE, '13', NULL, NULL),
			('Foot','Un mini tournois de football avec des équipes de 6 au parc de la base de loisir d\'Arras ',FALSE, '0', '0', '2019-03-14', FALSE, '21', '26', NULL),
			('Basket','Un mini tournois de basket avec des équipes de 6 au parc de la base de loisir d\'Arras ',FALSE, '0', '0', '2019-03-14', FALSE, '21', '26', NULL),
			('Grosse caisse','Non on parle de Vincent en soirée mais de la batterie on attends les amateur de cet instrument le Jeudi 28 Février dans le local BDE ',FALSE, '0', '0', '2019-02-28', FALSE, '2', NULL, NULL),
			('Nettoyage du parc','Malgrès le peu de nombre de vote pour cette idée nous la mettons tout de même en place, volontaire pour nettoyer le parc de l\'école ? rejoignez nous jeudi 7 Février', FALSE, '0', '0', '2019-02-07', FALSE, '21', '25', '18'),
			('Lan','Exia Lan organise une LAN jeudi 4 avril les jeux proposé sont CS et LOL voila t\'aimes pas tu viens pas !! Non on rigole viens quand même une salle pour d\'autres jeux est prévu',FALSE, '0', '0', '2019-04-04', FALSE, '13', '28', '19');

INSERT INTO manifestation(manifestation_name, manifestation_description, manifestation_is_idea, id_member_suggest)
	VALUES 	('Projet X','Faire un projet X à l\'école',TRUE,'1'),
			('Ciné','Aller au ciné ensemeble sa serait une bonne idée ou projeter un film dans l\'amphi',TRUE,'5'),
			('Karting','Les amateurs de sports mécaique sa vous tente un karting, et ceux qui sont pas amateur non plus on est pas la pour la compet ^^',TRUE,'18'),
			('Paintball','Plutot que de jouer à des jeux vidéo "violent" on le ferrais pas en vrai',TRUE,'22'),
			('Laser Game','Le laser game c\'est moins violent que le paintball mais sa reste cool a faire',TRUE,'14'),
			('Musée','Ceux qui aiment les travaux manuel, le musée d\'Arras propose une initation à la mosaïque du 13 au 15 février',TRUE,'6'),
			('CES','Ca fait une petite trotte jusqu\'a Vegas mais sa serait interéssant d\'y aller',TRUE,'19'),
			('PGW','Qui veux qu\'on aille a la PGW',TRUE,'19'),
			('JeudiGO','On se prend un jeudi aprèm et on prend le controle de toutes les arènes d\'arras, forcément je parle à la team Blue, les plus forts quoi ..',TRUE,'19'),
			('Drift','Je sais pas comment avec quoi ni ou mais faut lacher du sale Stututu',TRUE,'19');

INSERT INTO category(category_name)
	VALUES 	('T-Shirt'),
			('Pull'),
			('Pantalon'),
			('Sac'),
			('Goodies');

INSERT INTO article(article_name, article_description, article_price, id_category)
	VALUES 	('T-Shirt 1ère Année','Le T-Shirt de l\'école pour les recrues','15','1'),
			('T-Shirt 2ème Année','Le T-Shirt de l\'école pour les 1ère classes','15','1'),
			('T-Shirt 3ème Année','Le T-Shirt de l\'école pour les caporals','15','1'),
			('T-Shirt 4ème Année','Le T-Shirt de l\'école pour les sergents','15','1'),
			('T-Shirt 5ème Année','Le T-Shirt de l\'école pour les adjudants','15','1'),
			('T-Shirt Tuteurs','Le T-Shirt de l\'école pour les majors','15','1'),
			('T-Shirt BDE','Le T-Shirt du BDE','25','1'),

			('Pull 1ère Année','Le Pull de l\'école pour les recrues','35','2'),
			('Pull 2ème Année','Le Pull de l\'école pour les 1ère classes','35','2'),
			('Pull 3ème Année','Le Pull de l\'école pour les caporals','35','2'),
			('Pull 4ème Année','Le Pull de l\'école pour les sergents','35','2'),
			('Pull 5ème Année','Le Pull de l\'école pour les adjudants','35','2'),
			('Pull Tuteurs','Le Pull de l\'école pour les majors','35','2'),

			('Sac à dos PC','Sac à dos adpaté aux PCs 15"-17"','50','4'),

			('Étiquettes CESI BDE','Étiquettes avec le logo de l\'ecole et du BDE à coller','10','5');