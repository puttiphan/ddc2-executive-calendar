<div
    id="eventModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm p-4"
>

    <div
        class="flex w-full max-w-5xl max-h-[90vh] flex-col overflow-hidden rounded-xl bg-white shadow-2xl"
    >

        {{-- Header --}}
        <div class="flex items-center justify-between border-b px-6 py-4">

            <div>

                <h2 class="text-xl font-semibold text-gray-800">
                    เพิ่มกิจกรรม
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Executive Calendar
                </p>

            </div>

            <button
                id="closeEventModal"
                type="button"
                class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-red-600"
            >
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-6 w-6"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />

                </svg>

            </button>

        </div>

        {{-- Body --}}
        <form
            id="eventForm"
            class="flex-1 overflow-y-auto p-6 space-y-6"
        >

            {{-- Executive / Category --}}
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                <div>

                    <label
                        for="executive_id"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        ผู้บริหาร
                    </label>

                    <select
                        id="executive_id"
                        name="executive_id"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    >
                    </select>

                </div>

                <div>

                    <label
                        for="category_id"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        ประเภทกิจกรรม
                    </label>

                    <select
                        id="category_id"
                        name="category_id"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    >
                    </select>

                </div>

            </div>

            {{-- Title --}}
            <div>

                <label
                    for="title"
                    class="mb-2 block text-sm font-medium text-gray-700"
                >
                    ชื่อกิจกรรม
                </label>

                <input
                    id="title"
                    name="title"
                    type="text"
                    placeholder="เช่น ประชุมผู้บริหารประจำเดือน"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

            </div>

            {{-- Description --}}
            <div>

                <label
                    for="description"
                    class="mb-2 block text-sm font-medium text-gray-700"
                >
                    รายละเอียด
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    placeholder="รายละเอียดกิจกรรม"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                ></textarea>

            </div>

            {{-- Location --}}
            <div>

                <label
                    for="location"
                    class="mb-2 block text-sm font-medium text-gray-700"
                >
                    สถานที่
                </label>

                <input
                    id="location"
                    name="location"
                    type="text"
                    placeholder="ห้องประชุม / Online"
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                >

            </div>

            {{-- DateTime --}}
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                <div>

                    <label
                        for="start_datetime"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        วันเวลาเริ่ม
                    </label>

                    <input
                        id="start_datetime"
                        name="start_datetime"
                        type="datetime-local"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    >

                </div>

                <div>

                    <label
                        for="end_datetime"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        วันเวลาสิ้นสุด
                    </label>

                    <input
                        id="end_datetime"
                        name="end_datetime"
                        type="datetime-local"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    >

                </div>

            </div>

                        {{-- Priority / Visibility / Color --}}
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">

                <div>

                    <label
                        for="priority"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        Priority
                    </label>

                    <select
                        id="priority"
                        name="priority"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    >
                        <option value="low">Low</option>
                        <option value="normal" selected>Normal</option>
                        <option value="high">High</option>
                        <option value="urgent">Urgent</option>
                    </select>

                </div>

                <div>

                    <label
                        for="visibility"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        Visibility
                    </label>

                    <select
                        id="visibility"
                        name="visibility"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                    >
                        <option value="public" selected>Public</option>
                        <option value="internal">Internal</option>
                        <option value="private">Private</option>
                    </select>

                </div>

                <div>

                    <label
                        for="color"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        สีของกิจกรรม
                    </label>

                    <input
                        id="color"
                        name="color"
                        type="color"
                        value="#2563eb"
                        class="h-11 w-full rounded-lg border border-gray-300"
                    >

                </div>

            </div>

            <input
                type="hidden"
                id="event_id"
                name="event_id"
                value=""
            >
            
            <input
                type="hidden"
                id="status"
                name="status"
                value="confirmed"
            >
           
            <input
                type="hidden"
                id="is_all_day"
                name="is_all_day"
                value="0"
            >

            {{-- Footer --}}
            <div class="sticky bottom-0 -mx-6 mt-8 border-t bg-white px-6 py-4">

                <div class="flex items-center justify-between gap-3">

                <button
                    id="deleteEvent"
                    type="button"
                    class="hidden rounded-lg bg-red-600 px-5 py-2 text-white transition hover:bg-red-700"
                >
                    🗑 ลบกิจกรรม
                </button>

            <div class="flex gap-3">

                <button
                    id="cancelEvent"
                    type="button"
                    class="rounded-lg border border-gray-300 bg-white px-5 py-2 text-gray-700 transition hover:bg-gray-100"
                >
                     ยกเลิก
                </button>

                <button
                    id="saveEvent"
                    type="submit"
                    class="rounded-lg bg-blue-600 px-6 py-2 text-white transition hover:bg-blue-700"
                >
                    บันทึกกิจกรรม
                </button>

        </div>

</div>
            </div>

        </form>

    </div>

</div>