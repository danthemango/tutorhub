/*
 * Group:    SCAD (Sami, Camille, Angelo, and Dan)
 * Purpose:  creates the tables needed for this project
 * Created:  2018-03-14 by Daniel 
 * Modified: -
 */

/* e.g.
   to change the columns of a table use:
   ALTER TABLE profiles ADD COLUMN pay DECIMAL(13,2) NOT NULL DEFAULT 20.00;
   to change a value in the table:
   UPDATE profiles SET pay = 18 WHERE id = 3;
*/

-- profiles will be used to remember information about tutors who have signed up
create table profiles (
   id          SERIAL,
   email       VARCHAR(40)    NOT NULL UNIQUE,
   password    VARCHAR(40),   -- TODO NOT NULL,
   firstname   VARCHAR(40),
   lastname    VARCHAR(40),
   phone       VARCHAR(40),
   date_joined DATETIME,
   ptype       VARCHAR(20)    NOT NULL DEFAULT "tutor",
   pay         DECIMAL(13,2)  NOT NULL DEFAULT 20.00,
   avatar      VARCHAR(20)    NOT NULL DEFAULT "avatar.png",
   PRIMARY KEY(id)
);

-- classes which exist on campus
create table classes(
   code        VARCHAR(10),   -- e.g.: math123
   description VARCHAR(100),
   PRIMARY KEY(code)
);

-- each class that a user is competent in is an entry here
create table skills (
   id          BIGINT UNSIGNED   NOT NULL,
   class       VARCHAR(20)       NOT NULL,
   PRIMARY KEY(id,class),
   FOREIGN KEY (id) REFERENCES profiles(id) ON DELETE CASCADE,
   FOREIGN KEY (class) REFERENCES classes(code)
);

-- availabilities: times when the tutor is available during a regular week
create table times(
   id          BIGINT UNSIGNED NOT NULL,
   -- daynum is the day of the week as a number 0..6 == monday..sunday
   daynum      INT         NOT NULL,         
   starttime   TIME        NOT NULL,
   endtime     TIME        NOT NULL,
   PRIMARY     KEY(id,daynum,starttime,endtime),
   FOREIGN KEY (id) REFERENCES profiles(id) ON DELETE CASCADE
);
