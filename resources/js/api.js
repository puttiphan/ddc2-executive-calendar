const headers = () => ({
    'Content-Type': 'application/json',
    'Accept': 'application/json',
    'X-CSRF-TOKEN': document
        .querySelector('meta[name="csrf-token"]')
        ?.content,
});

async function request(url, options = {}) {

    const response = await fetch(url, {
        credentials: 'same-origin',
        headers: headers(),
        ...options,
    });

    if (!response.ok) {

        let error = {};

        try {
            error = await response.json();
        } catch (_) {
            error = {
                message: response.statusText
            };
        }

        throw error;
    }

    return response.json();
}

export function getExecutives() {
    return request('/api/executives');
}

export function getCategories() {
    return request('/api/categories');
}

export function getEvents() {
    return request('/events');
}

export function createEvent(data) {
    return request('/events', {
        method: 'POST',
        body: JSON.stringify(data),
    });
}

export function updateEvent(id, data) {
    return request(`/events/${id}`, {
        method: 'PUT',
        body: JSON.stringify(data),
    });
}

export function deleteEvent(id) {
    return request(`/events/${id}`, {
        method: 'DELETE',
    });
}