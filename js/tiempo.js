let idReserva = document.getElementById('id_reserva');
setTimeout(function(){
    window.location.href = 'reservas.php?id_reserva=' + idReserva.innerHTML;
    window.alert("Reserva cancelada, No ha sido aceptada en menos de 30 segundos")
}, 30000);