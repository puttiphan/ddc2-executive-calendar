import './modal';

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

export let calendar = null;

document.addEventListener('DOMContentLoaded', () => {

    const calendarEl = document.getElementById('calendar');

    if (!calendarEl) {
        return;
    }

    calendar = new Calendar(calendarEl, {

        plugins: [
            dayGridPlugin,
            interactionPlugin,
        ],

        initialView: 'dayGridMonth',

        locale: 'th',

        height: 'auto',

        selectable: true,

        editable: true,

        events: '/events',

        dateClick(info) {

            window.openEventModal({

                mode: 'create',

                date: info.dateStr,

            });

        },

        eventClick(info) {

            window.openEventModal({

                mode: 'edit',

                event: info.event,

            });

        },

    });

    calendar.render();

});