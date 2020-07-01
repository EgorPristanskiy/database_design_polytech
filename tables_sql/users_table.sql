CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE  interns(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(50) NOT NULL,
    backgroun_id INT NOT NULL AUTO_INCREMENT,
    skills_id INT NOT NULL AUTO_INCREMENT
);
CREATE TABLE  intern_skills(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    intern_id INT FOREIGN KEY REFERENCES interns(id),
    programming_language_id INT FOREIGN KEY REFERENCES programming_languages(id)
);
CREATE TABLE programming_languages(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	language_name VARCHAR(50) NOT NULL
)
---------------------------------------------
CREATE TABLE CV (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(255) NOT NULL UNIQUE,
    age INT NOT NULL,
    sex VARCHAR(50) NOT NULL
    id_specilization INT,
)
-------------------------------------------------
CREATE TABLE work_places(
    id INT  NOT NULL PRIMARY KEY AUTO_INCREMENT,
    organization_name VARCHAR(255) NOT NULL
);

CREATE TABLE position(
    id INT NOT NULL PRIMARY AUTO_INCREMENT,
    position_name VARCHAR(255) NOT NULL
);

CREATE TABLE project(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    project_name VARCHAR(255) NOT NULL
);

CREATE TABLE schedule(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    schedule_name VARCHAR(255) NOT NULL
);

CREATE TABLE background(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    intern_id  INT NOT NULL,
    work_place_id INT NOT NULL,
    position_id INT NOT NULL,
    project_id INT NOT NULL,
    schedule_id INT NOT NULL,
    CONSTRAINT intern_id_foreign_key FOREIGN KEY (intern_id) REFERENCES interns(id),
    CONSTRAINT work_place_id_foreign_key FOREIGN KEY (work_place_id) REFERENCES work_places(id),
    CONSTRAINT position_id_foreign_key FOREIGN KEY (position_id) REFERENCES position(id),
    CONSTRAINT project_id_foreign_key FOREIGN KEY (project_id) REFERENCES project(id),
    CONSTRAINT schedule_id_foreign_key FOREIGN KEY (schedule_id) REFERENCES schedule(id)
);

CREATE TABLE education_organization(
    id INT  NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    education_name VARCHAR(255) NOT NULL,
)

CREATE TABLE specialization(
    id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    specialization_name VARCHAR(255) NOT NULL
)

CREATE TABLE degree(
    id INT  NOT NULL PRIMARY KEY AUTO_INCREMENT,
    degree_name VARCHAR(255) NOT NULL
)

CREATE TABLE scientific_adviser(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(255) NOT NULL
)

CREATE TABLE diploma(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    thesis VARCHAR(255) NOT  NULL UNIQUE,
    mark INT NOT NULL,
    scientific_adviser_id INT NOT NULL,
    CONSTRAINT scientific_adviser_id_foreign_key FOREIGN KEY (scientific_adviser_id) REFERENCES scientific_adviser(id)
)

CREATE TABLE education(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    intern_id INT NOT NULL,
    specialization_id INT NOT NULL,
    education_organization_id INT NOT NULL,
    degree_id INT NOT NULL,
    diploma_id INT NOT NULL,
    CONSTRAINT intern_id_foreign_key_1 FOREIGN KEY (intern_id) REFERENCES interns(id),
    CONSTRAINT education_organization_id_foreign_key FOREIGN KEY (education_organization_id) REFERENCES education_organization(id),
    CONSTRAINT specialization_id_foreign_key FOREIGN KEY (specialization_id) REFERENCES specialization(id),
    CONSTRAINT degree_id_foreign_key FOREIGN KEY (degree_id) REFERENCES degree(id),
    CONSTRAINT diploma_id_foreign_key FOREIGN KEY (diploma_id) REFERENCES diploma(id)
)

CREATE TABLE grant_type(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    grant_type_name VARCHAR(255) NOT NULL
)

CREATE TABLE grants(
    id INT NOT NULL  PRIMARY KEY AUTO_INCREMENT,
    intern_id INT NOT NULL,
    grant_name VARCHAR(255) NOT NULL,
    grant_type_id INT NOT NULL,
    CONSTRAINT intern_id_foreign_key_2 FOREIGN KEY (intern_id) REFERENCES interns(id),
    CONSTRAINT grant_type_id_foreign_key FOREIGN KEY (grant_type_id) REFERENCES grant_type(id)
)

CREATE TABLE patent_type(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    patent_type_name VARCHAR(255) NOT NULL
)

CREATE TABLE patent(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    intern_id INT NOT NULL,
    patent_name VARCHAR(255) NOT NULL,
    patent_type_id INT NOT NULL,
    CONSTRAINT intern_id_foreign_key_3 FOREIGN KEY (intern_id) REFERENCES interns(id),
    CONSTRAINT patent_type_id_foreign_key FOREIGN KEY (patent_type_id) REFERENCES patent_type(id)
)

CREATE TABLE citizen(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    citizen_name VARCHAR(255) NOT NULL
)

CREATE TABLE level_of_language(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    level_of_language_name VARCHAR(255)
)