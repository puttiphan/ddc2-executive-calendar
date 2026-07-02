import { calendar } from './calendar';

import {
    createEvent,
    updateEvent,
    deleteEvent,
} from './api';

document.addEventListener('DOMContentLoaded', () => {

    const form = document.getElementById('eventForm');

    const modal = document.getElementById('eventModal');

    const eventId = document.getElementById('event_id');

    const deleteButton = document.getElementById('deleteEvent');

    if (!form || !modal || !eventId || !deleteButton) {
        return;
    }
deleteButton.addEventListener('click', async () => {

    const id = eventId.value;

    if (!id) {
        return;
    }

    if (!confirm('ยืนยันการลบกิจกรรมนี้?')) {
        return;
    }

    try {

        await deleteEvent(id);

        form.reset();

        eventId.value = '';

        modal.classList.remove('flex');
        modal.classList.add('hidden');

        calendar.refetchEvents();

        alert('ลบกิจกรรมเรียบร้อย');

    } catch (error) {

        console.error(error);

        alert('ไม่สามารถลบกิจกรรมได้');

    }

});
    form.addEventListener('submit', async (e) => {

        e.preventDefault();

        const id = eventId.value;

        const data = {

            executive_id: document.getElementById('executive_id').value,

            category_id: document.getElementById('category_id').value,

            title: document.getElementById('title').value,

            description: document.getElementById('description').value,

            location: document.getElementById('location').value,

            meeting_url: '',

            start_datetime: document.getElementById('start_datetime').value,

            end_datetime: document.getElementById('end_datetime').value,

            is_all_day:
                document.getElementById('is_all_day').value === '1',

            priority: document.getElementById('priority').value,

            status: document.getElementById('status').value,

            visibility: document.getElementById('visibility').value,

            color: document.getElementById('color').value,

        };

        try {
            console.log(data);
            if (id) {
            await updateEvent(id, data);
            } else {
            await createEvent(data);
            }

            form.reset();

            eventId.value = '';

            document.getElementById('color').value = '#2563eb';
            document.getElementById('status').value = 'confirmed';
            document.getElementById('is_all_day').value = '0';
            
            modal.classList.remove('flex');
            modal.classList.add('hidden');

            calendar.refetchEvents();

            alert('บันทึกกิจกรรมเรียบร้อย');

        } catch (error) {

            console.error(error);

            if (error.errors) {

                const messages = Object.values(error.errors)
                    .flat()
                    .join('\n');

                alert(messages);

                return;

            }

            alert('เกิดข้อผิดพลาด');

        }

    });

});