/*
 * Group:    SCAD (Sami, Camille, Angelo, and Dan)
 * Purpose:  drops all tables
 * Created:  2018-03-14 by Daniel 
 * Modified: -
 */

-- due to foreign key constraints, they need to be dropped in a specific order
drop table times;
drop table skills;
drop table classes;
drop table profiles;
