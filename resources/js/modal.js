import { getExecutives, getCategories } from './api';

/*
|--------------------------------------------------------------------------
| Modal State
|--------------------------------------------------------------------------
*/

const modalState = {
    mode: 'create',
    event: null,
};

/*
|--------------------------------------------------------------------------
| DOM Cache
|--------------------------------------------------------------------------
*/

let modal = null;
let form = null;

let executiveSelect = null;
let categorySelect = null;
let deleteButton = null;

/*
|--------------------------------------------------------------------------
| Modal
|--------------------------------------------------------------------------
*/

function openModal() {

    modal.classList.remove('hidden');
    modal.classList.add('flex');

}

function closeModal() {

    modal.classList.remove('flex');
    modal.classList.add('hidden');

}

/*
|--------------------------------------------------------------------------
| Form
|--------------------------------------------------------------------------
*/

function clearForm() {

    form.reset();

    document.getElementById('event_id').value = '';

    document.getElementById('status').value = 'confirmed';

    document.getElementById('is_all_day').value = '0';

    document.getElementById('color').value = '#2563eb';

}

/*
|--------------------------------------------------------------------------
| Lookup
|--------------------------------------------------------------------------
*/

async function loadExecutives() {

    executiveSelect.innerHTML = '';

    const executives = await getExecutives();

    executives.forEach(item => {

        const option = document.createElement('option');

        option.value = item.id;

        option.textContent = item.display_name;

        executiveSelect.appendChild(option);

    });

}

async function loadCategories() {

    categorySelect.innerHTML = '';

    const categories = await getCategories();

    categories.forEach(item => {

        const option = document.createElement('option');

        option.value = item.id;

        option.textContent = item.name;

        categorySelect.appendChild(option);

    });

}

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/

async function openEventModal(options = {}) {

    modalState.mode = options.mode ?? 'create';

    modalState.event = options.event ?? null;

    await loadExecutives();

    await loadCategories();

    clearForm();

    if (deleteButton) {
        deleteButton.classList.add('hidden');
    }

    if (modalState.mode === 'edit') {

        fillForm(modalState.event);

        if (deleteButton) {
            deleteButton.classList.remove('hidden');
        }

    } else if (options.date) {

        document.getElementById('start_datetime').value =
            options.date + 'T09:00';

        document.getElementById('end_datetime').value =
            options.date + 'T10:00';

    }

    openModal();

}

/*
|--------------------------------------------------------------------------
| Bootstrap
|--------------------------------------------------------------------------
*/

document.addEventListener('DOMContentLoaded', () => {

    modal = document.getElementById('eventModal');

    form = document.getElementById('eventForm');

    if (!modal || !form) {
        return;
    }

    executiveSelect = document.getElementById('executive_id');

    categorySelect = document.getElementById('category_id');

    deleteButton = document.getElementById('deleteEvent');

    const openButton = document.getElementById('openEventModal');

    const closeButton = document.getElementById('closeEventModal');

    const cancelButton = document.getElementById('cancelEvent');

    if (openButton) {

        openButton.addEventListener('click', () => {

            openEventModal({
                mode: 'create',
            });

        });

    }

    if (closeButton) {

        closeButton.addEventListener('click', closeModal);

    }

    if (cancelButton) {

        cancelButton.addEventListener('click', closeModal);

    }

    modal.addEventListener('click', (e) => {

        if (e.target === modal) {

            closeModal();

        }

    });

    window.openEventModal = openEventModal;

});
/*
|--------------------------------------------------------------------------
| Fill Form
|--------------------------------------------------------------------------
*/

function fillForm(event) {

    if (!event) {
        return;
    }

    document.getElementById('event_id').value = event.id ?? '';

    document.getElementById('title').value =
        event.title ?? '';

    document.getElementById('description').value =
        event.extendedProps.description ?? '';

    document.getElementById('location').value =
        event.extendedProps.location ?? '';

    document.getElementById('executive_id').value =
        event.extendedProps.executive_id ?? '';

    document.getElementById('category_id').value =
        event.extendedProps.category_id ?? '';

    document.getElementById('priority').value =
        event.extendedProps.priority ?? 'normal';

    document.getElementById('visibility').value =
        event.extendedProps.visibility ?? 'internal';

    document.getElementById('status').value =
        event.extendedProps.status ?? 'confirmed';

    document.getElementById('color').value =
        event.backgroundColor ?? '#2563eb';

    if (event.start) {

        document.getElementById('start_datetime').value =
            event.start.toISOString().slice(0, 16);

    }

    if (event.end) {

        document.getElementById('end_datetime').value =
            event.end.toISOString().slice(0, 16);

    }

}