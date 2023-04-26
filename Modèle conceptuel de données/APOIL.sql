DROP DATABASE IF EXISTS apoils;
CREATE DATABASE apoils;
USE apoils;
/*
DROP TABLE IF EXISTS Valider;
DROP TABLE IF EXISTS Animal;
DROP TABLE IF EXISTS Espece;
DROP TABLE IF EXISTS Race ;
DROP TABLE IF EXISTS Utilisateur;
DROP TABLE IF EXISTS Agir;
*/

CREATE TABLE Utilisateur(
	id VARCHAR(70) PRIMARY KEY,
    nom VARCHAR(70),
    prenom VARCHAR(70),
    ddn date,
    mail VARCHAR(70),
    telephone CHAR(11),
    login_u VARCHAR(70),
    mdp VARCHAR(70),
    photo_id VARCHAR(150),
    valide INT,
    administrateur INT,
    favoris text
);


CREATE TABLE Valider(
	id VARCHAR(70),
    nom VARCHAR(70),
    prenom VARCHAR(70),
    ddn date
);



SELECT * FROM Valider;
UPDATE Utilisateur SET administrateur=1 WHERE id="USR-1682236684kkDih";
/* Créer validation*/

CREATE TABLE Espece(
	id INT PRIMARY KEY,
    nom VARCHAR(50)
);

CREATE TABLE Race(
	id INT PRIMARY KEY,
	nom_r VARCHAR(50),
	idEspece INT,
    particularite_physique VARCHAR(90),
    esperance_vie INT,
    education VARCHAR(90),
    activite_physique VARCHAR(200),
    entretien_hygiene VARCHAR(200),
    res_race text, /* résumé sur la ce race	*/	
    FOREIGN KEY fk_idEspece(idEspece) REFERENCES Espece(id)
);

CREATE TABLE Animal(
	id VARCHAR(50) PRIMARY KEY NOT NULL,
    nom VARCHAR(70) NOT NULL,
    idEspece INT NOT NULL,
    idRace INT NOT NULL,
    age INT NOT NULL,
    adjectif VARCHAR(70) NOT NULL,
	etat_sante VARCHAR(70) NOT NULL,
    photo text NOT NULL,
    idUti VARCHAR(70) NOT NULL,
   
    FOREIGN KEY fk_iduti(idUti) REFERENCES Utilisateur(id),
    FOREIGN KEY fk_idrace(idRace) REFERENCES Race(id),
	FOREIGN KEY fk_idesp(idEspece) REFERENCES Espece(id)
);

/**/

SELECT * FROM Race;
SELECT * FROM Utilisateur;

UPDATE Utilisateur SET administrateur=1 WHERE id="USR-16822567534bFRL";
UPDATE Utilisateur SET favoris="" WHERE id="USR-168245255404cmG";
SELECT * FROM Race WHERE idEspece=1;





INSERT INTO Espece VALUES (01,"Chien");
INSERT INTO Espece VALUES (02,"Chat");
INSERT INTO Espece VALUES (03,"Oiseau");
INSERT INTO Espece VALUES (04,"Dinosaure");

INSERT INTO Race VALUES (02,"Berger anglais",1,"Poile long", 12, "bonne", "pas de besoin particulier", "longtemps", "Le Bobtail ou Chien de Berger Anglais Ancestral (Old English Sheepdog), est un chien de grande taille, vigoureux, musclé et à la constitution harmonieuse. Il est aisément reconnaissable à sa fourrure très fournie, à son timbre de voix particulier lorsqu'il aboie, ainsi qu'à sa démarche singulière, qui pourrait rappeler celle de l'ours. Le Bobtail prendra soin de chaque membre de sa famille comme s’il avait en charge un troupeau.");
INSERT INTO Race VALUES (07,"Rotweiler",1,"Trapu", 12, "bonne", "activité regulière recommandée", "brossage","Le Rottweiler est un chien solide, qui évoque la force. Son corps très musclé fait de lui un chien bien proportionné, à la fois souple et endurant ! Il dispose d'un corps bien équilibré, harmonieux, élégant. Il s'agit d'un des chiens de garde les plus populaires du monde à notre époque.");
INSERT INTO Race VALUES (08,"Labrador",1,"Robuste",12,"facile","promenade journalière ou accès à un jardin","brossage hebdomadaire","Doux, fidèle, intelligent et joueur, le Labrador Retriever est le compagnon idéal pour tous. C’est d’ailleurs une des races de chiens les plus répandues au monde. Bon gardien, il n’est pas trop craintif. Particulièrement patient et docile, il est fantastique en tant que chien guide d’aveugle. À l’écoute, ardent et volontaire, il est fort apprécié par les sauveteurs.");
INSERT INTO Race VALUES (11,"Chihuahua",1,"Bruyant",18,"Compliqué","Aucune","Peu résistant au froid","Petit, moche qui fait énormément de bruit pour sa petite taille");
INSERT INTO Race VALUES (13,"Berger Allemand",1,"Grand",12,"Facile","Balade journalière ou accès à un jardin","Brossage hebdomadaire lors de la mu","Très joyeux et joueur, il est doté d’une grande intelligence. Il reste fidèle et attaché à son maître. Patient et courageux, c’est aussi un chien protecteur avec les enfants. D’un tempérament assez souple, il n’en est pas moins vif et assez dominateur. Affectueux et d’un naturel paisible, il a besoin de se dépenser chaque jour. Il est d’un dévouement sans faille pour son propriétaire. Il s’agit d’un animal très sensible, qui apprécie les félicitations après un bon acte. Il s’agit d’un chien très sportif et très joueur. C'est un chien facile au quotidien à condition d’être attentif avec lui. S’il est très reconnaissant du temps passé avec lui et de l’amour reçu, il peut se sentir abandonné, délaissé.");
INSERT INTO Race VALUES (14,"Husky",1,"Supporte très bien le froid",12,"Facile","Activité physique journalière nécessaire","Brossage hebdomadaire lors de la mu","Le Husky de Sibérie possède une intelligence au-dessus de la moyenne. Bien qu’hyperactif, il sait se montrer doux et docile. Il est d’une grande fidélité à son maître, sans pour autant se montrer possessif comme peuvent l’être des chiens de garde. Il peut être placé dans la catégorie des chiens de garde, même s’il n’est pas forcément très méfiant à l’encontre d’étrangers.bIl n’est également pas agressif envers ses congénères. Particulièrement gentil, le Husky convient parfaitement aux familles avec enfant. Il est indépendant mais pas solitaire puisqu’il a l’habitude de vivre en groupe. Ainsi, son maître doit être constamment présent à ses côtés.");
INSERT INTO Race VALUES (09,"Chat commun",2,"Existe dans toutes les couleurs",15,"Aucune","Aucune","Se lave tout seul","Le Chat de gouttière s’adapte à tout ! Campagne, ville, maison ou appartement. Certains Chats de gouttière sont très “pantouflards” : le jardin et la chasse les intéressent beaucoup moins que la sieste sur un arbre à chat, près du radiateur ! A l’inverse, certains ont gardé un instinct de chasse et n’hésitent pas à sauter depuis un balcon d'appartement pour attraper un insecte ou un oiseau… ce qui peut occasionner des blessures. Soyez simplement à l'écoute de son caractère et de ses besoins.");
INSERT INTO Race VALUES (10,"Maine Coon",2,"Poils longs",18,"Aucune","Aucune","Brossage pour un beau pellage","À la fois curieux et joueur, il ne repoussera pas les tentatives de s’en approcher de vos enfants, bien au contraire. Calme et patient, il appréciera les attentions, les caresses et les moments de jeux avec la famille. Sociable, il s’adapte également à la présence d’autres animaux, qu’il s’agisse de chats ou de chiens. Ni effrayé, ni agressif, il prendra ainsi peu à peu ses marques au sein de votre famille.");
INSERT INTO Race VALUES (124,"Chat americain",2,"Gros", 15, "trouve la litière", "peu", "il aimera jouer", "L'American Shorthair est indépendant, mais affectueux. Il apprécie la compagnie de son propriétaire, avec lequel il aime jouer. À ce titre, il sera également enclin à échanger avec les enfants et d’autres chats ou chiens. Il est intelligent, habile et agile. Il a besoin d’une vie de famille. Il est fidèle et adore être câliné.");

INSERT INTO Race VALUES (12,"Perroquet Ara",3,"Existe en bleu et en rouge",60,"Peu apprendre des mots simples","Aucune","Se nourrit d'herbes et de graines","Les perroquets se sont rendus célèbres par leur capacité plus ou moins développée à imiter les sons et plus particulièrement la voix humaine. S'ils sont bien entraînés, ils peuvent ainsi posséder un vocabulaire de plusieurs centaines de mots. Certains perroquets sont même capables de comprendre les mots qu'ils prononcent et les agencer intelligemment, de reconnaître les formes et les couleurs, etc.");

INSERT INTO Race VALUES (247,"Poule commune",3,"donne des oeufs", 12, "aucune", "aucune", "peu", "Il y a 5.000 ans l'être humain a domestiqué le coq bankiva, ou coq doré, originaire d'Asie du Sud et du Sud Est, qui est devenu notre coq domestique. Déclinée en nombreuses races dont certaines ont maintenant disparu, la poule domestique est élevée principalement dans le monde pour sa chair et ses œufs. Elle est suffisamment intelligente pour être capable d'empathie envers ses semblables ou encore reconnaître des visages.");
INSERT INTO Race VALUES (248,"Perruche",3,"Colorée", 10, "aucune", "aucune", "peu", "La perruche ondulée est une espèce d’oiseau perroquet appartenant à l’ordre des psittaciformes et à la famille des psittacidés. Elle vit en Australie à l’état sauvage, mais a été introduite sur l’ensemble des continents en tant qu’oiseau de cage ou d’ornement.Son nom vient de son plumage ondulé qui plaît aux amateurs et aux éleveurs d’oiseaux de volière et d’oiseaux de compagnie");
INSERT INTO Race VALUES (300,"Crocodile",4,"recouvert d'écailles", 100, "nécessaire", "aucune", "peu", "Le crocodile est un reptile qui possède une grande gueule et de puissantes mâchoires. C’est un redoutable animal qui peut atteindre plus de 7 mètres de longueur. Son corps est moins court que sa queue. Chacune de ses 4 pattes comporte 4 doigts, et ceux de ses pattes arrière sont réunis par une membrane facilitant la nage (comme ceux des canards). Son corps est recouvert d’écailles cornées sur son dos.");
INSERT INTO Race VALUES (301,"Sphénodon",4,"fossile vivant", 100, "aucune", "aucune", "peu", "Le sphénodon : on l'appelle aussi tuatara ou hattéria. Le sphénodon est un reptile apparu il y a plus de 220 millions d'années. Il s'agit de ce qu'on appelle un animal panchronique, ou fossile vivant, c'est à dire que sa forme actuelle est très proche de celle d'espèces que l'on connaît sous la forme de fossiles.");



SELECT nom FROM Animal WHERE idRace=2;
SELECT * FROM Utilisateur;
SELECT * FROM Animal;
DELETE FROM Animal WHERE id="ANI-16824117689gKiE";
UPDATE Utilisateur SET administrateur=1 WHERE id="USR-168245255404cmG";
SELECT R.nom FROM Race R, Espece E WHERE R.idEspece=E.id AND E.nom="Chien";



SELECT nom, nom_r FROM Animal A, Race R WHERE R.id=A.idRace;
DELETE FROM Animal WHERE id="ANI-1682415207Yf89L";