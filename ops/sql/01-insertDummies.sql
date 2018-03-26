/*
 * Group:    SCAD (Sami, Camille, Angelo, and Dan)
 * Purpose:  insert dummy data into database
 * Created:  2018-03-14 by Daniel 
 * Modified: -
 */

-- creating dummy profiles
insert into profiles(email,firstname,lastname,date_joined,avatar) values ("danthemango@tutorhub.com", "Daniel","Guenther",NOW(),"card_snowydan.jpg");
insert into profiles(email,firstname,lastname,date_joined,avatar) values ("neptunny@tutorhub.com", "Nep","Tune",NOW(),"card_neptune.jpg");
insert into profiles(email,firstname,lastname,date_joined,avatar) values ("yourbuddhy@tutorhub.com", "Budd","Ha",NOW(),"card_thai_statue.jpg");
insert into profiles(email,firstname,lastname,date_joined,avatar) values ("palmy@tutorhub.com", "Palm","Trees",NOW(),"card_palm_tree.jpg");
insert into profiles(email,firstname,lastname,date_joined) values ("jdoe@tutorhub.com", "John","Doe",NOW());

-- insert a list of classes
insert into classes(code, description) values("csci160", "Computer Science I");
insert into classes(code, description) values("csci161", "Computer Science II"); 
insert into classes(code) values("csci162"); 
insert into classes(code) values("csci251"); 
insert into classes(code, description) values("csci260", "Data Structures and Algorithms"); 
insert into classes(code, description) values("csci261", "Assembly Programming"); 
insert into classes(code) values("csci265");
insert into classes(code, description) values("csci310", "Human Computer Interfaces");
insert into classes(code, description) values("csci311", "Web Programming");
insert into classes(code, description) values("csci320", "Foundations of Computer Science"); 
insert into classes(code) values("csci330");
insert into classes(code) values("csci355");
insert into classes(code, description) values("csci370", "Databases"); 
insert into classes(code) values("csci400");
insert into classes(code, description) values("csci460", "Networking"); 
insert into classes(code) values("csci485");
insert into classes(code, description) values("math121", "Calculus I"); 
insert into classes(code, description) values("math122", "Calculus II"); 
insert into classes(code) values("math123");
insert into classes(code) values("math151");
insert into classes(code, description) values("math223", "Discrete Combinatorics"); 
insert into classes(code, description) values("math241", "Linear Algebra"); 

-- insert a set of skills
insert into skills values((select id from profiles where email = "danthemango@tutorhub.com"), "csci160");
insert into skills values((select id from profiles where email = "danthemango@tutorhub.com"), "csci161");
insert into skills values((select id from profiles where email = "danthemango@tutorhub.com"), "csci251");
insert into skills values((select id from profiles where email = "danthemango@tutorhub.com"), "csci320");
insert into skills values((select id from profiles where email = "danthemango@tutorhub.com"), "math223");
insert into skills values((select id from profiles where email = "jdoe@tutorhub.com"), "math241");

-- insert a set of availabilities
insert into times values((select id from profiles where email = "neptunny@tutorhub.com"),0,"0:00", "2:00");
insert into times values((select id from profiles where email = "neptunny@tutorhub.com"),0,"3:00", "6:00");
insert into times values((select id from profiles where email = "neptunny@tutorhub.com"),0,"6:00", "7:00");
insert into times values((select id from profiles where email = "neptunny@tutorhub.com"),0,"8:00", "9:00");
insert into times values((select id from profiles where email = "neptunny@tutorhub.com"),0,"20:00", "24:00");
insert into times values((select id from profiles where email = "neptunny@tutorhub.com"),3,"0:00", "8:30");
insert into times values((select id from profiles where email = "neptunny@tutorhub.com"),3,"9:00", "12:00");
insert into times values((select id from profiles where email = "yourbuddhy@tutorhub.com"),0,"17:00", "22:00");
insert into times values((select id from profiles where email = "yourbuddhy@tutorhub.com"),1,"17:00", "22:00");
insert into times values((select id from profiles where email = "yourbuddhy@tutorhub.com"),2,"17:00", "22:00");
insert into times values((select id from profiles where email = "yourbuddhy@tutorhub.com"),3,"10:00", "11:00");
insert into times values((select id from profiles where email = "yourbuddhy@tutorhub.com"),5,"6:00", "18:00");
insert into times values((select id from profiles where email = "yourbuddhy@tutorhub.com"),6,"6:00", "18:00");
insert into times values((select id from profiles where email = "palmy@tutorhub.com"), 2, "7:00", "19:00");
insert into times values((select id from profiles where email = "palmy@tutorhub.com"), 3, "7:00", "19:00");
insert into times values((select id from profiles where email = "danthemango@tutorhub.com"), 4, "7:30", "19:30");
