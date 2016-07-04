TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` trigger state_update after update on restmoney\nfor EACH ROW\nBEGIN\nif new.count < 0 THEN\nSET @statein = 0;\nelse \nSET @statein = 1;\nend if;\nupdate stateinfo\nset state =@statein\nwhere tel = new.tel;\nEND'
sql_modes=1073741824
definers='root@localhost'
client_cs_names='utf8'
connection_cl_names='utf8_general_ci'
db_cl_names='utf8_general_ci'
