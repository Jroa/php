-- --------------------------------------------------------------------------------
-- Routine DDL
-- Note: comments before and after the routine body will not be stored by the server
-- --------------------------------------------------------------------------------
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_reservasdeusuario`(IN pIdUsuario int)
BEGIN
  select r.idReserva, r.idSala, s.nombre as nombreSala, r.idUsuario, 
  date_format(r.fecha, '%Y-%m-%d') as fecha, 
  r.hora, 
  cast(round(r.precio) as char) as precio
  from reserva r,
  sala s
  where
  r.idSala = s.idSala
  and r.idUsuario = pIdUsuario
  order by fecha desc, hora desc;
END
