SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE jqcalendar (

  Id bigserial not null,
  Subject varchar(1000) character set utf8 default NULL,
  Location varchar(200) character set utf8 default NULL,
  Description varchar(255) character set utf8 default NULL,
  StartTime datetime default NULL,
  EndTime datetime default NULL,
  IsAllDayEvent  NOT NULL,
  Color varchar(200) character set utf8 default NULL,
  RecurringRule varchar(500) character set utf8 default NULL,
  
  PRIMARY KEY  (Id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;




create table appointments (

    Appt_ID bigserial not null,
    Cust_ID bigserial not null references Customers(Cust_ID),
    Categories_ID bigserial not null references Categories(Categories_ID),
    Location varchar(255) not null,
    Appt_time varchar(25) not null,
    Num_Attendies integer not null,
    Description varchar(255) not null,
    Notes varchar(255),
    Reoccuring_Int varchar(25),

    Primary Key (Appt_ID)
);
