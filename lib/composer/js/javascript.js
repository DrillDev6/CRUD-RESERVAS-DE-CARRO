(function(win,doc){
        'use strict';
    
    let calendarEl=doc.querySelector('.calendar')
    let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'pt-br',
        headerToolbar:{
            start: 'prev, next, today',
            center: 'title',
            end: 'dayGridMonth,timeGridWeek,timeGridDay' 
        },
        buttonText:{
            today: 'Hoje',
            month: 'Mês',
            week: 'Semana',
            day: 'Dia'
        },
        dateClick: function(info) {
            alert('Clicked on: ' + info.dateStr);
            alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
            alert('Current view: ' + info.view.type);
            // change the day's background color just for fun
            info.dayEl.style.backgroundColor = 'red';
          },
          events: '/lib/js/events.json',
          
            
        
    });
    calendar.render();

})(window,document);