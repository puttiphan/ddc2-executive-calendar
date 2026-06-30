import Alpine from 'alpinejs';

import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

console.log('APP.JS LOADED');

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {

    console.log('DOM LOADED');

    const calendarEl = document.getElementById('calendar');

    console.log('Calendar Element:', calendarEl);

    if (!calendarEl) {
        console.error('Calendar element not found');
        return;
    }

    const calendar = new Calendar(calendarEl, {

        plugins: [
            dayGridPlugin,
            interactionPlugin,
        ],

        initialView: 'dayGridMonth',

        selectable: true,

        editable: true,

        events: '/events',

        dateClick(info) {

            const title = prompt('ชื่อกิจกรรม');

            if (!title) {
                return;
            }

            saveEvent({
                title: title,
                start: info.dateStr + ' 09:00:00',
                end: info.dateStr + ' 10:00:00',
                all_day: false,
            });

        },

        select(info) {

            const title = prompt('ชื่อกิจกรรม');

            if (!title) {
                calendar.unselect();
                return;
            }

            saveEvent({
                title: title,
                start: info.startStr,
                end: info.endStr,
                all_day: info.allDay,
            });

            calendar.unselect();

        }

    });

    console.log('Before calendar.render()');

    calendar.render();

    console.log('After calendar.render()');

    function saveEvent(data) {

        fetch('/events', {

            method: 'POST',

            headers: {

                'Content-Type': 'application/json',

                'X-CSRF-TOKEN': document
                    .querySelector('meta[name="csrf-token"]')
                    .content

            },

            body: JSON.stringify(data)

        })
        .then(response => response.json())
        .then(() => {

            console.log('Event saved');

            calendar.refetchEvents();

        })
        .catch(error => {

            console.error(error);

            alert('บันทึกข้อมูลไม่สำเร็จ');

        });

    }

});