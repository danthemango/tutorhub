/*
 * Group:    SCAD (Sami, Camille, Angelo, and Dan)
 * Purpose:  insert dummy data into database
 * Created:  2018-03-14 by Daniel 
 * Modified: -
 */

-- creating dummy profiles
insert into profiles(email,firstname,lastname,phone,date_joined,avatar) values ("danthemango@tutorhub.com", "Daniel","Guenther",5555555555,NOW(),"card_snowydan.jpg");
insert into profiles(email,firstname,lastname,phone,date_joined,avatar) values ("neptunny@tutorhub.com", "Nep","Tune",5555555556,NOW(),"card_neptune.jpg");
insert into profiles(email,firstname,lastname,phone,date_joined,avatar) values ("yourbuddhy@tutorhub.com", "Budd","Ha",5555555557,NOW(),"card_thai_statue.jpg");
insert into profiles(email,firstname,lastname,phone,date_joined,avatar) values ("palmy@tutorhub.com", "Palm","Trees",5555555558,NOW(),"card_palm_tree.jpg");
insert into profiles(email,firstname,lastname,phone,date_joined) values ("jdoe@tutorhub.com", "John","Doe",5555555559,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello1@world1.com", "hello1","world1",5555555560,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello2@world2.com", "hello2","world2",5555555561,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello3@world3.com", "hello3","world3",5555555562,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello4@world4.com", "hello4","world4",5555555563,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello5@world5.com", "hello5","world5",5555555564,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello6@world6.com", "hello6","world6",5555555565,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello7@world7.com", "hello7","world7",5555555566,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello8@world8.com", "hello8","world8",5555555567,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello9@world9.com", "hello9","world9",5555555568,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello10@world10.com", "hello10","world10",5555555569,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello11@world11.com", "hello11","world11",5555555570,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello12@world12.com", "hello12","world12",5555555571,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello13@world13.com", "hello13","world13",5555555572,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello14@world14.com", "hello14","world14",5555555573,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello15@world15.com", "hello15","world15",5555555574,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello16@world16.com", "hello16","world16",5555555575,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello17@world17.com", "hello17","world17",5555555576,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello18@world18.com", "hello18","world18",5555555577,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello19@world19.com", "hello19","world19",5555555578,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello20@world20.com", "hello20","world20",5555555579,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello21@world21.com", "hello21","world21",5555555580,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello22@world22.com", "hello22","world22",5555555581,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello23@world23.com", "hello23","world23",5555555582,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello24@world24.com", "hello24","world24",5555555583,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello25@world25.com", "hello25","world25",5555555584,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello26@world26.com", "hello26","world26",5555555585,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello27@world27.com", "hello27","world27",5555555586,NOW());
insert into profiles(email,firstname,lastname,phone,date_joined) values ("hello28@world28.com", "hello28","world28",5555555587,NOW());

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
insert into times values((select id from profiles where email = "hello1@world1.com"),0,"0:00", "1:00");
insert into times values((select id from profiles where email = "hello2@world2.com"),0,"1:00", "2:00");
insert into times values((select id from profiles where email = "hello3@world3.com"),0,"2:00", "3:00");
insert into times values((select id from profiles where email = "hello4@world4.com"),0,"3:00", "4:00");
insert into times values((select id from profiles where email = "hello5@world5.com"),0,"4:00", "5:00");
insert into times values((select id from profiles where email = "hello6@world6.com"),0,"5:00", "6:00");
insert into times values((select id from profiles where email = "hello7@world7.com"),0,"6:00", "7:00");
insert into times values((select id from profiles where email = "hello8@world8.com"),0,"7:00", "8:00");
insert into times values((select id from profiles where email = "hello9@world9.com"),0,"8:00", "9:00");
insert into times values((select id from profiles where email = "hello10@world10.com"),0,"9:00", "10:00");
insert into times values((select id from profiles where email = "hello11@world11.com"),0,"10:00", "11:00");
insert into times values((select id from profiles where email = "hello12@world12.com"),0,"11:00", "12:00");
insert into times values((select id from profiles where email = "hello13@world13.com"),0,"12:00", "13:00");
insert into times values((select id from profiles where email = "hello14@world14.com"),0,"13:00", "14:00");
