create database informationia;

\c informationia

CREATE TABLE administrateur (
    id_administrateur serial not null PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    mdp VARCHAR(50)
);


CREATE TABLE contenu (
    id_contenu          serial NOT NULL PRIMARY KEY,
    id_administrateur    int NOT NULL REFERENCES administrateur (id_administrateur),
    titre               VARCHAR(255) NOT NULL,
    body                TEXT NOT NULL,
    photo             varchar,
    lieu                VARCHAR(255),
    date_publication    TIMESTAMP
);


INSERT INTO administrateur (nom,email,mdp) values ('admin','admin@gmail.com','admin');

INSERT INTO contenu (id_administrateur, titre, body, photo, lieu, date_publication)
VALUES (1, 'Chat GPT-3', 'Le Chat GPT-3 est un modèle de langage naturel développé par OpenAI. Il utilise l''apprentissage profond pour générer du texte qui ressemble à ce qu''un humain pourrait écrire.', '/images/gpt3.jpg', 'Internet', now());

(1, 'NLP', 'Le traitement automatique du langage naturel (NLP) est une branche de l''IA qui se concentre sur l''interaction entre les ordinateurs et les êtres humains en utilisant le langage naturel.', '/images/nlp2.jpg', 'Informatique', NOW()),
    (1, 'Vision par ordinateur', 'La vision par ordinateur est une discipline de l''IA qui vise à donner aux ordinateurs la capacité de comprendre et d''interpréter les images et les vidéos.', '/images/vision_ordinateur.jpg', 'Informatique', NOW()),
    (1, 'L''éthique de l''IA', 'L''éthique de l''IA se concentre sur les questions morales et éthiques liées à la création et à l''utilisation de l''IA.', '/images/ei.jpeg', 'Philosophie', NOW()),
    (1, 'L''IA dans les soins de santé', 'L''IA est de plus en plus utilisée dans les soins de santé pour aider les professionnels à diagnostiquer les maladies et à développer de nouveaux traitements.', '/images/sante.jpg', 'Santé', NOW()),
    (1, 'Robotique et Intelligence', 'La robotique et l''intelligence artificielle sont des domaines étroitement liés qui visent à développer des machines intelligentes et autonomes capables d''interagir avec le monde physique.', '/images/Robotique1.jpg', 'Technologie', NOW());
