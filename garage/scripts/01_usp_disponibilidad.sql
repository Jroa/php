-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_disponibilidad`(IN pFechaInicio varchar(10))
BEGIN
  
  DECLARE done INT DEFAULT 0;
  
  DECLARE dDia01 decimal(10,2);
  DECLARE dDia02 decimal(10,2);
  DECLARE dDia03 decimal(10,2);
  DECLARE dDia04 decimal(10,2);
  DECLARE dDia05 decimal(10,2);
  DECLARE dDia06 decimal(10,2);
  DECLARE dDia07 decimal(10,2);

  DECLARE vhora  varchar(5);
  DECLARE vDia01 varchar(10);
  DECLARE vDia02 varchar(10);
  DECLARE vDia03 varchar(10);
  DECLARE vDia04 varchar(10);
  DECLARE vDia05 varchar(10);
  DECLARE vDia06 varchar(10);
  DECLARE vDia07 varchar(10);  

  DECLARE vFecha01 varchar(10);
  DECLARE vFecha02 varchar(10);
  DECLARE vFecha03 varchar(10);
  DECLARE vFecha04 varchar(10);
  DECLARE vFecha05 varchar(10);
  DECLARE vFecha06 varchar(10);
  DECLARE vFecha07 varchar(10);  
  
  
  DECLARE dFechaInicio date;
  
  DECLARE CTarifa CURSOR FOR
  select
  hora,
  case dayofweek(dFechaInicio)
    when 1 then domingo
    when 2 then lunes
    when 3 then martes
    when 4 then miercoles
    when 5 then jueves
    when 6 then viernes
    when 7 then sabado
    else        0
  end as dia01,
  case dayofweek(date_add(dFechaInicio, interval 1 day))
    when 1 then domingo
    when 2 then lunes
    when 3 then martes
    when 4 then miercoles
    when 5 then jueves
    when 6 then viernes
    when 7 then sabado
    else        0
  end as dia02,
  case dayofweek(date_add(dFechaInicio, interval 2 day))
    when 1 then domingo
    when 2 then lunes
    when 3 then martes
    when 4 then miercoles
    when 5 then jueves
    when 6 then viernes
    when 7 then sabado
    else        0
  end as dia03,
  case dayofweek(date_add(dFechaInicio, interval 3 day))
    when 1 then domingo
    when 2 then lunes
    when 3 then martes
    when 4 then miercoles
    when 5 then jueves
    when 6 then viernes
    when 7 then sabado
    else        0
  end as dia04,
  case dayofweek(date_add(dFechaInicio, interval 4 day))
    when 1 then domingo
    when 2 then lunes
    when 3 then martes
    when 4 then miercoles
    when 5 then jueves
    when 6 then viernes
    when 7 then sabado
    else        0
  end as dia05,
  case dayofweek(date_add(dFechaInicio, interval 5 day))
    when 1 then domingo
    when 2 then lunes
    when 3 then martes
    when 4 then miercoles
    when 5 then jueves
    when 6 then viernes
    when 7 then sabado
    else        0
  end as dia06,
  case dayofweek(date_add(dFechaInicio, interval 6 day))
    when 1 then domingo
    when 2 then lunes
    when 3 then martes
    when 4 then miercoles
    when 5 then jueves
    when 6 then viernes
    when 7 then sabado
    else        0
  end as dia07,
date_format(dFechaInicio,'%Y-%m-%d') fecha01,
date_format(date_add(dFechaInicio, interval 1 day),'%Y-%m-%d') fecha02,
date_format(date_add(dFechaInicio, interval 2 day),'%Y-%m-%d') fecha03,
date_format(date_add(dFechaInicio, interval 3 day),'%Y-%m-%d') fecha04,
date_format(date_add(dFechaInicio, interval 4 day),'%Y-%m-%d') fecha05,
date_format(date_add(dFechaInicio, interval 5 day),'%Y-%m-%d') fecha06,
date_format(date_add(dFechaInicio, interval 6 day),'%Y-%m-%d') fecha07  
   from tarifa
   order by hora;
   
  
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

  set dFechaInicio = str_to_date(pFechaInicio, '%Y-%m-%d');

  delete from disponibilidad;
  open CTarifa;
  ct_loop: LOOP
    FETCH Ctarifa INTO vHora, dDia01, dDia02, dDia03, dDia04, dDia05, dDia06, dDia07,
                      vFecha01,vFecha02,vFecha03,vFecha04,vFecha05,vFecha06,vFecha07;
    
    IF done = 1 THEN
      LEAVE ct_loop;
    END IF;
    
    set vDia01 = cast(round(dDia01) as char);
    set vDia02 = cast(round(dDia02) as char);
    set vDia03 = cast(round(dDia03) as char);
    set vDia04 = cast(round(dDia04) as char);
    set vDia05 = cast(round(dDia05) as char);
    set vDia06 = cast(round(dDia06) as char);
    set vDia07 = cast(round(dDia07) as char);
    
    insert into disponibilidad(hora,dia01,dia02,dia03,dia04,dia05,dia06,dia07,
                                fecha01, fecha02,fecha03,fecha04,fecha05,fecha06,fecha07)
    values (vHora,vDia01,vDia02,vDia03,vDia04,vDia05,vDia06,vDia07,
                              vFecha01,vFecha02,vFecha03,vFecha04,vFecha05,vFecha06,vFecha07);
  END LOOP ct_loop;
  close CTarifa;
  -- insert into disponibilidad (hora)
  -- select hora from tarifa;
  update disponibilidad
  set estado01 = 'D',
  estado02 = 'D',
  estado03= 'D',
  estado04= 'D',
  estado05='D',
  estado06='D',
  estado07='D';
  
  select hora, dia01, dia02, dia03, dia04, dia05, dia06, dia07,
        fecha01,fecha02,fecha03,fecha04,fecha05,fecha06,fecha07,
        estado01,estado02,estado03,estado04,estado05,estado06,estado07
  from disponibilidad;
END
