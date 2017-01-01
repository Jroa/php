-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_horasreservadas`(IN pIdSala int, IN pFechaInicio varchar(10))
BEGIN
  DECLARE dFechaInicio date;
  DECLARE dFechaTermino date;
  set dFechaInicio = str_to_date(pFechaInicio, '%Y-%m-%d');
  set dFechaTermino = date_add(dFechaInicio, interval 7 day);

  select idReserva, idSala, idUsuario, date_format(fecha, '%Y-%m-%d') as fecha, hora, 
  cast(round(precio) as char) as precio from reserva
  where 
  idSala = pIdSala
  and fecha >= dFechaInicio
  and fecha < dFechaTermino
  order by hora, fecha;
  
END
