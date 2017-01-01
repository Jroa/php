-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_semanareserva`(IN pFechaInicio varchar(10))
BEGIN
  DECLARE dFechaInicio date;
  set dFechaInicio = str_to_date(pFechaInicio, '%Y-%m-%d');
  
  select 
    date_format(dFechaInicio, '%Y-%m-%d') as fecha01,
    date_format(date_add(dFechaInicio, interval 1 day), '%Y-%m-%d') as fecha02,
    date_format(date_add(dFechaInicio, interval 2 day), '%Y-%m-%d') as fecha03,
    date_format(date_add(dFechaInicio, interval 3 day), '%Y-%m-%d') as fecha04,
    date_format(date_add(dFechaInicio, interval 4 day), '%Y-%m-%d') as fecha05,
    date_format(date_add(dFechaInicio, interval 5 day), '%Y-%m-%d') as fecha06,
    date_format(date_add(dFechaInicio, interval 6 day), '%Y-%m-%d') as fecha07,
    date_format(dFechaInicio,'%d') as dia01,
    date_format(date_add(dFechaInicio, interval 1 day),'%d') as dia02,
    date_format(date_add(dFechaInicio, interval 2 day),'%d') as dia03,
    date_format(date_add(dFechaInicio, interval 3 day),'%d') as dia04,
    date_format(date_add(dFechaInicio, interval 4 day),'%d') as dia05,
    date_format(date_add(dFechaInicio, interval 5 day),'%d') as dia06,
    date_format(date_add(dFechaInicio, interval 6 day),'%d') as dia07,
    dayofweek(dFechaInicio) dia01DeSemana,
    dayofweek(date_add(dFechaInicio, interval 1 day)) as dia02DeSemana,
    dayofweek(date_add(dFechaInicio, interval 2 day)) as dia03DeSemana,
    dayofweek(date_add(dFechaInicio, interval 3 day)) as dia04DeSemana,
    dayofweek(date_add(dFechaInicio, interval 4 day)) as dia05DeSemana,
    dayofweek(date_add(dFechaInicio, interval 5 day)) as dia06DeSemana,
    dayofweek(date_add(dFechaInicio, interval 6 day)) as dia07DeSemana;  
END
