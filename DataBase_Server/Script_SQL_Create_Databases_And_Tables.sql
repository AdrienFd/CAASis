#BEACAUSE OF MYSQL CONVENTIONS AND FORBIDDEN WORDS THERE AS BEEN CHANGED BETWEEN THIS SCRIPT AND THE MERISE CONCEPTION
# Merise conception 'word' -> became 'word' in script
# member -> Member
# Like_Img -> Like_Img_Img
# Purchase -> Purchase
# Manifestation -> Manifestation
# Boolean -> Booleanean

# Create the National and Local database
CREATE DATABASE IF NOT EXISTS CAASis_NATIONAL_DB;
CREATE DATABASE IF NOT EXISTS CAASis_LOCAL_ARRAS_DB;

ALTER DATABASE CAASis_NATIONAL_DB CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER DATABASE CAASis_LOCAL_ARRAS_DB CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;





# Select the National DB the Members are registred at the national
USE CAASis_NATIONAL_DB;


# The table Location contain all CESI sites (Arras, Lille ...)
CREATE TABLE Location(
        id_location   Int  Auto_increment  NOT NULL ,
        location_name Varchar (50) NOT NULL ,
        
        CONSTRAINT Location_PK PRIMARY KEY (id_location)
)ENGINE=InnoDB;

# The table Statut contain the status a Member can have at the CESI (student, student office member, CESI employee)
CREATE TABLE Statut(
        id_statut   Int  Auto_increment  NOT NULL ,
        statut_name Varchar (50) NOT NULL ,

        CONSTRAINT Statut_PK PRIMARY KEY (id_statut)
)ENGINE=InnoDB;

# The table Member contain all information about a Member (we linked the Member with the is location and statut with the location id and statut id)
CREATE TABLE Member(
        id_member         Int  Auto_increment  NOT NULL ,
        member_name       Varchar (50) NOT NULL ,
        member_firstname  Varchar (50) NOT NULL ,
        email             Varchar (255) NOT NULL ,
        email_verified    Boolean NOT NULL DEFAULT 0 ,
        activation_link	  Varchar (50) NOT NULL ,
        password          Varchar (255) NOT NULL ,
        token             Varchar (255) NULL,
        created_at        Date NOT NULL,
        updated_at        Date NOT NULL,
        id_location       Int NOT NULL ,
        id_statut         Int NOT NULL ,

        CONSTRAINT Member_PK PRIMARY KEY (id_member) ,

        CONSTRAINT Member_Location_FK FOREIGN KEY (id_location) REFERENCES Location(id_location) ON UPDATE CASCADE ON DELETE CASCADE ,
        CONSTRAINT Member_Statut_FK FOREIGN KEY (id_statut) REFERENCES Statut(id_statut) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;





# Select the Local Arras DB the images, Manifestations, ideas, articles are registred at the local
USE CAASis_LOCAL_ARRAS_DB;


# The table Image contain both image from Manifestation and Article
CREATE TABLE Image(
        id_img                Int  Auto_increment  NOT NULL ,
        img_name              Varchar (50) NOT NULL ,
        img_url               Varchar (512) NOT NULL ,
        img_approbate_date    Date DEFAULT NULL,
        id_member             Int NOT NULL ,
        id_member_approbator  Int DEFAULT NULL,
        CONSTRAINT Image_PK PRIMARY KEY (id_img) ,

        CONSTRAINT Image_Member_FK FOREIGN KEY (id_member) REFERENCES CAASis_NATIONAL_DB.Member(id_member) ON UPDATE CASCADE ON DELETE CASCADE ,
        CONSTRAINT Image_Member_Approbator_FK FOREIGN KEY (id_member_approbator) REFERENCES CAASis_NATIONAL_DB.Member(id_member) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;

# The table Comment contain all comment Members made on an image (the comment as a specific to allow Member to comment an iamge multiple time, for each comment made by a Member we linked the comment with the Member id and image id)
CREATE TABLE Comment(
        id_comment                Int  Auto_increment  NOT NULL ,
        comment_content           Varchar (50) NOT NULL ,
        comment_approbate_date    Date DEFAULT NULL,
        id_member                 Int NOT NULL ,
        id_img                    Int NOT NULL ,
        id_member_approbator      Int DEFAULT NULL,
        CONSTRAINT Comment_PK PRIMARY KEY (id_comment) ,

        CONSTRAINT Comment_Member_FK FOREIGN KEY (id_member) REFERENCES CAASis_NATIONAL_DB.Member(id_member) ON UPDATE CASCADE ON DELETE CASCADE ,
        CONSTRAINT Comment_Image_FK FOREIGN KEY (id_img) REFERENCES Image(id_img) ON UPDATE CASCADE ON DELETE CASCADE ,
        CONSTRAINT Comment_Member_Approbator_FK FOREIGN KEY (id_member_approbator) REFERENCES CAASis_NATIONAL_DB.Member(id_member) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;

# The table Like_Img contain the Like_Img of the Members on an image (if the Member as Like_Img an image there is a creation of record with his id and the image id)
CREATE TABLE Like_Img(
        id_img    Int NOT NULL ,
        id_member Int NOT NULL ,

        CONSTRAINT Like_Img_PK PRIMARY KEY (id_img,id_member) ,

        CONSTRAINT Like_Img_Image_FK FOREIGN KEY (id_img) REFERENCES Image(id_img) ON UPDATE CASCADE ON DELETE CASCADE ,
        CONSTRAINT Like_Img_Member_FK FOREIGN KEY (id_member) REFERENCES CAASis_NATIONAL_DB.Member(id_member) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;








# The table Manifestation contain all Manifestation offered by student desk they can be ideas from idea box once they have been validate (we linked the Manifestation with the Member who create it)
CREATE TABLE Manifestation(
        id_manifestation             Int  Auto_increment  NOT NULL ,
        manifestation_name           Varchar (50) NOT NULL ,
        manifestation_description    Varchar (1024) NOT NULL ,
        manifestation_recurrency     Boolean NOT NULL DEFAULT 0 ,
        manifestation_frequency      Int NULL DEFAULT NULL ,
        manifestation_price          Int NOT NULL DEFAULT 0 ,
        manifestation_date           Date DEFAULT NULL ,
        manifestation_is_idea        Boolean NOT NULL DEFAULT 0 ,
        manifestation_approbate_date Date DEFAULT NULL,
        id_member_suggest            Int DEFAULT NULL,
        id_member_plan               Int DEFAULT NULL,
        id_member_approbator         Int DEFAULT NULL,

        CONSTRAINT Manifestation_PK PRIMARY KEY (id_manifestation) ,

        CONSTRAINT Manifestation_Member_Suggest_FK FOREIGN KEY (id_member_suggest) REFERENCES CAASis_NATIONAL_DB.Member(id_member) ON UPDATE CASCADE ON DELETE CASCADE ,
        CONSTRAINT Manifestation_Member_Plan_FK FOREIGN KEY (id_member_plan) REFERENCES CAASis_NATIONAL_DB.Member(id_member) ON UPDATE CASCADE ON DELETE CASCADE ,
        CONSTRAINT Manifestation_Member_Approbator_FK FOREIGN KEY (id_member_approbator) REFERENCES CAASis_NATIONAL_DB.Member(id_member) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;

# The table Vote contain the vote of the Members for an idea (if the Member as vote for an idea there is a creation of record with his id and the idea id)
CREATE TABLE Vote(
        id_manifestation   Int NOT NULL ,
        id_member          Int NOT NULL ,

        CONSTRAINT Vote_PK PRIMARY KEY (id_manifestation,id_member) ,

        CONSTRAINT Vote_Manifestation_FK FOREIGN KEY (id_manifestation) REFERENCES Manifestation(id_manifestation) ON UPDATE CASCADE ON DELETE CASCADE ,
        CONSTRAINT Vote_Member_FK FOREIGN KEY (id_member) REFERENCES CAASis_NATIONAL_DB.Member(id_member) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;

# The table Illustrate_Manifestation contain all the images related to a specific Manifestation (for X images illustrating an Manifestation there will be X record with the image ids and Manifestation id)
CREATE TABLE Illustrate_Manifestation(
        id_img           Int NOT NULL ,
        id_manifestation Int NOT NULL,

        CONSTRAINT Illustrate_Manifestation_PK PRIMARY KEY (id_img,id_manifestation) ,

        CONSTRAINT Illustrate_Manifestation_Image_FK FOREIGN KEY (id_img) REFERENCES Image(id_img) ON UPDATE CASCADE ON DELETE CASCADE ,
        CONSTRAINT Illustrate_Manifestation_Manifestation_FK FOREIGN KEY (id_manifestation) REFERENCES Manifestation(id_manifestation) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;

# The table Participate contain the Member that participate to an Manifestation (if the Member participate to Manifestation there is a creation of record with his id and the Manifestation id)
CREATE TABLE Participate(
        id_manifestation Int NOT NULL ,
        id_member        Int NOT NULL ,

        CONSTRAINT Participate_PK PRIMARY KEY (id_manifestation,id_member) ,

        CONSTRAINT Participate_Manifestation_FK FOREIGN KEY (id_manifestation) REFERENCES Manifestation(id_manifestation) ON UPDATE CASCADE ON DELETE CASCADE ,
        CONSTRAINT Participate_Member_FK FOREIGN KEY (id_member) REFERENCES CAASis_NATIONAL_DB.Member(id_member) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;





# The table Category contain all products category (T-Shirt, Goodies ...)
CREATE TABLE Category(
        id_category   Int  Auto_increment  NOT NULL ,
        category_name Varchar (50) NOT NULL ,

        CONSTRAINT Category_PK PRIMARY KEY (id_category)
)ENGINE=InnoDB;

# The table Article contain the sold article on the website (the article are linked with ONE image and ONE category)
CREATE TABLE Article(
        id_article          Int  Auto_increment  NOT NULL ,
        article_name        Varchar (50) NOT NULL ,
        article_description Varchar (1024) NOT NULL ,
        article_price       Varchar (1024) NOT NULL ,
        id_img              Int DEFAULT NULL,
        id_category         Int NOT NULL ,

        CONSTRAINT Article_PK PRIMARY KEY (id_article) ,

        CONSTRAINT Article_Image_FK FOREIGN KEY (id_img) REFERENCES Image(id_img) ON UPDATE CASCADE ON DELETE CASCADE ,
        CONSTRAINT Article_Category_FK FOREIGN KEY (id_category) REFERENCES Category(id_category) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;

# The table Purchase contain all the purchase passed by Members (the Purchase is linked with the Member who purchased with the Member id)
CREATE TABLE Purchase(
        id_purchase    Int  Auto_increment  NOT NULL ,
        purchase_date  Date NOT NULL ,
        purchase_price Int NOT NULL ,
        id_member      Int NOT NULL ,

        CONSTRAINT Purchase_PK PRIMARY KEY (id_purchase) ,

        CONSTRAINT Purchase_Member_FK FOREIGN KEY (id_member) REFERENCES CAASis_NATIONAL_DB.Member(id_member) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;

# The table Command contain all articles purchased in a Purchase (for X article purchased in a Purchase there will be X record with the article ids and Purchase id)
CREATE TABLE Command(
        id_article    Int NOT NULL ,
        id_purchase   Int NOT NULL ,

        CONSTRAINT Command_PK PRIMARY KEY (id_article,id_purchase) ,

        CONSTRAINT Command_Article_FK FOREIGN KEY (id_article) REFERENCES Article(id_article) ON UPDATE CASCADE ON DELETE CASCADE ,
        CONSTRAINT Command_Purchase_FK FOREIGN KEY (id_purchase) REFERENCES Purchase(id_purchase) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;

# The table Shopping_Cart contain all article in the shoppping cart (for X article purchased in a Purchase there will be X record with the article ids and Purchase id)
CREATE TABLE Shopping_Cart(
        id_article   Int NOT NULL ,
        id_member    Int NOT NULL ,
        
        CONSTRAINT Shopping_Cart_PL PRIMARY KEY (id_article,id_member) ,

        CONSTRAINT Shopping_Cart_Article_FK FOREIGN KEY (id_article) REFERENCES Article(id_article) ON UPDATE CASCADE ON DELETE CASCADE ,
        CONSTRAINT Shopping_Cart_Member_FK FOREIGN KEY (id_member) REFERENCES CAASis_NATIONAL_DB.Member(id_member) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;
