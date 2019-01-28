DROP USER IF EXISTS 'CAASis_Arras_Admin'@'%';
DROP USER IF EXISTS 'CAASis_National_Admin'@'%';
DROP USER IF EXISTS 'CAASis_Arras_API'@'%';
DROP USER IF EXISTS 'CAASis_National_API'@'%';
DROP USER IF EXISTS 'CAASis_Arras'@'%';
DROP USER IF EXISTS 'CAASis_National'@'%';

FLUSH PRIVILEGES;

USE CAASis_NATIONAL_DB;
CREATE VIEW API_Member AS
    SELECT member_name,member_firstname,email,location_name,statut_name
	FROM member
	NATURAL JOIN statut
	NATURAL JOIN location;

USE CAASis_LOCAL_ARRAS_DB;
CREATE VIEW API_Manifestation AS
    SELECT manifestation_name,manifestation_description,manifestation_recurrency,manifestation_frequency,manifestation_price,manifestation_date,member_name,member_firstname
    FROM CAASis_LOCAL_ARRAS_DB.Manifestation
    INNER JOIN CAASis_NATIONAL_DB.Member ON CAASis_LOCAL_ARRAS_DB.Manifestation.id_member_approbator = CAASis_NATIONAL_DB.Member.id_member
    WHERE manifestation_is_idea = 0
    AND CAASis_LOCAL_ARRAS_DB.Manifestation.id_member_approbator IS NOT NULL ;

CREATE VIEW API_Comment AS
    SELECT comment_content,img_url,member_name,member_firstname
    FROM CAASis_LOCAL_ARRAS_DB.Comment
    INNER JOIN CAASis_NATIONAL_DB.Member ON Comment.id_member = CAASis_NATIONAL_DB.Member.id_member
    INNER JOIN CAASis_LOCAL_ARRAS_DB.Image ON Comment.id_img = CAASis_LOCAL_ARRAS_DB.Image.id_img
    WHERE comment.id_member_approbator IS NOT NULL;

CREATE VIEW API_Image AS
    SELECT img_url, member_name,member_firstname
    FROM CAASis_LOCAL_ARRAS_DB.Image
    INNER JOIN CAASis_NATIONAL_DB.Member ON CAASis_LOCAL_ARRAS_DB.Image.id_member = CAASis_NATIONAL_DB.Member.id_member
    WHERE CAASis_LOCAL_ARRAS_DB.Image.id_member_approbator IS NOT NULL;

CREATE USER 'CAASis_National_Admin'@'%' IDENTIFIED BY 'CAASis_National_PSW';
GRANT ALL PRIVILEGES ON CAASis_NATIONAL_DB.* TO 'CAASis_National_Admin'@'%' WITH GRANT OPTION;
CREATE USER 'CAASis_Arras_Admin'@'%' IDENTIFIED BY 'CAASis_Arras_PSW';
GRANT ALL PRIVILEGES ON CAASis_LOCAL_ARRAS_DB.* TO 'CAASis_Arras_Admin'@'%' WITH GRANT OPTION;


CREATE USER 'CAASis_National'@'%' IDENTIFIED BY 'CAASis_National_PSW';
REVOKE ALL PRIVILEGES, GRANT OPTION FROM 'CAASis_National'@'%';
GRANT INSERT, SELECT, UPDATE, DELETE, EXECUTE ON CAASis_NATIONAL_DB.* TO 'CAASis_National'@'%';
CREATE USER 'CAASis_Arras'@'%' IDENTIFIED BY 'CAASis_Arras_PSW';
REVOKE ALL PRIVILEGES, GRANT OPTION FROM 'CAASis_Arras'@'%';
GRANT INSERT, SELECT, UPDATE, DELETE, EXECUTE ON CAASis_LOCAL_ARRAS_DB.* TO 'CAASis_Arras'@'%';

CREATE USER 'CAASis_National_API'@'%' IDENTIFIED BY 'CAASis_National_PSW';
REVOKE ALL PRIVILEGES, GRANT OPTION FROM 'CAASis_National_API'@'%';
GRANT SELECT ON CAASis_NATIONAL_DB.API_Member TO 'CAASis_National_API'@'%' ;

CREATE USER 'CAASis_Arras_API'@'%' IDENTIFIED BY 'CAASis_Arras_PSW';
REVOKE ALL PRIVILEGES, GRANT OPTION FROM 'CAASis_Arras_API'@'%';
GRANT SELECT ON CAASis_LOCAL_ARRAS_DB.Article TO 'CAASis_Arras_API'@'%';
GRANT SELECT ON CAASis_LOCAL_ARRAS_DB.Category TO 'CAASis_Arras_API'@'%';
GRANT SELECT ON CAASis_LOCAL_ARRAS_DB.API_Manifestation TO 'CAASis_Arras_API'@'%';
GRANT SELECT ON CAASis_LOCAL_ARRAS_DB.API_Image TO 'CAASis_Arras_API'@'%';
GRANT SELECT ON CAASis_LOCAL_ARRAS_DB.API_Comment TO 'CAASis_Arras_API'@'%';

FLUSH PRIVILEGES;
