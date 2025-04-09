(function(win, doc) {
    'use strict';
  
    let calendarEl = doc.querySelector('.calendar');
    let calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'pt-br',
      selectable: true, // Permite selecionar intervalo
      selectMirror: true,
  
      headerToolbar: {
        start: 'prev,next,today',
        center: 'title',
        end: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
  
      buttonText: {
        today: 'Hoje',
        month: 'Mês',
        week: 'Semana',
        day: 'Dia'
      },
  
      // Carrega eventos do PHP (em vez de JSON estático)
      events: '../config/carregar_eventos.php',
  
      // Substitui o dateClick por select
      select: function(info) {
        const destino = prompt("Destino:");
        const kmInicial = prompt("KM Inicial:");
        const kmFinal = prompt("KM Final:");
        const avarias = prompt("Avarias:");
  
        if (!destino || !kmInicial || !kmFinal) {
          alert("Você precisa preencher todos os dados.");
          return;
        }
  
        const formData = new FormData();
        formData.append("data", info.startStr.split("T")[0]);
        formData.append("horaInicio", info.startStr.split("T")[1] || '00:00:00');
        formData.append("horaFim", info.endStr.split("T")[1] || '00:00:00');
        formData.append("destino", destino);
        formData.append("kmInicial", kmInicial);
        formData.append("kmFinal", kmFinal);
        formData.append("avarias", avarias);
  
        fetch('../salvar_evento.php', {
          method: 'POST',
          body: formData
        })
          .then(res => res.text())
          .then(msg => {
            alert(msg);
            calendar.refetchEvents(); // Atualiza os eventos
          });
      }
    });
  
    calendar.render();
  })(window, document);
  