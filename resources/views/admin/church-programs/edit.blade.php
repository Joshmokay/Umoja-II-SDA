<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Edit Church Program ✨</h1>
            <p class="text-sm text-slate-500">Update the program details and nested activities.</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 px-4 py-3 bg-rose-100 border border-rose-200 text-rose-600 rounded-sm">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow-lg rounded-sm border border-slate-200 p-6" x-data="programForm()">
            <form action="{{ route('admin.church-programs.update', $churchProgram) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- Title -->
                    <div>
                        <label class="block text-sm font-medium mb-1" for="title">Program Title <span class="text-rose-500">*</span></label>
                        <input id="title" class="form-input w-full" type="text" name="title" value="{{ old('title', $churchProgram->title) }}" required />
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-medium mb-1" for="category">Category / Period <span class="text-rose-500">*</span></label>
                        <select id="category" class="form-select w-full" name="category" required>
                            <option value="Morning" {{ old('category', $churchProgram->category) === 'Morning' ? 'selected' : '' }}>Morning</option>
                            <option value="Midday" {{ old('category', $churchProgram->category) === 'Midday' ? 'selected' : '' }}>Midday</option>
                            <option value="Afternoon" {{ old('category', $churchProgram->category) === 'Afternoon' ? 'selected' : '' }}>Afternoon</option>
                            <option value="Evening" {{ old('category', $churchProgram->category) === 'Evening' ? 'selected' : '' }}>Evening</option>
                            <option value="Mid-week" {{ old('category', $churchProgram->category) === 'Mid-week' ? 'selected' : '' }}>Mid-week</option>
                        </select>
                    </div>

                    <!-- Day -->
                    <div>
                        <label class="block text-sm font-medium mb-1" for="day">Day <span class="text-rose-500">*</span></label>
                        <select id="day" class="form-select w-full" name="day" required>
                            <option value="Saturday" {{ old('day', $churchProgram->day) === 'Saturday' ? 'selected' : '' }}>Saturday (Sabbath)</option>
                            <option value="Sunday" {{ old('day', $churchProgram->day) === 'Sunday' ? 'selected' : '' }}>Sunday</option>
                            <option value="Wednesday" {{ old('day', $churchProgram->day) === 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                            <option value="Friday" {{ old('day', $churchProgram->day) === 'Friday' ? 'selected' : '' }}>Friday</option>
                            <option value="Other" {{ old('day', $churchProgram->day) === 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    
                    <!-- Times -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1" for="start_time">Start Time</label>
                            <input id="start_time" class="form-input w-full" type="time" name="start_time" value="{{ old('start_time', $churchProgram->start_time ? \Carbon\Carbon::parse($churchProgram->start_time)->format('H:i') : '') }}" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" for="end_time">End Time</label>
                            <input id="end_time" class="form-input w-full" type="time" name="end_time" value="{{ old('end_time', $churchProgram->end_time ? \Carbon\Carbon::parse($churchProgram->end_time)->format('H:i') : '') }}" />
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-1" for="description">Short Description</label>
                        <textarea id="description" class="form-input w-full" name="description" rows="2">{{ old('description', $churchProgram->description) }}</textarea>
                    </div>

                    <!-- Toggles -->
                    <div class="md:col-span-2 flex items-center gap-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_recurring" class="form-checkbox" {{ old('is_recurring', $churchProgram->is_recurring) ? 'checked' : '' }} />
                            <span class="text-sm ml-2">Recurring Program</span>
                        </label>
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" class="form-checkbox" {{ old('is_active', $churchProgram->is_active) ? 'checked' : '' }} />
                            <span class="text-sm ml-2">Active (Visible)</span>
                        </label>
                        
                        <div class="ml-auto flex items-center gap-2">
                            <label class="block text-sm font-medium" for="order">Display Order</label>
                            <input id="order" class="form-input w-20" type="number" name="order" value="{{ old('order', $churchProgram->order) }}" />
                        </div>
                    </div>
                </div>

                <hr class="border-slate-200 mb-6">

                <!-- Detailed Activities -->
                <div class="mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-semibold text-slate-800">Detailed Activities</h2>
                        <button type="button" @click="addActivity" class="btn bg-sky-500 hover:bg-sky-600 text-white text-sm rounded-lg px-3 py-1.5 flex items-center">
                            <svg class="w-4 h-4 fill-current shrink-0 mr-2" viewBox="0 0 16 16"><path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" /></svg>
                            Add Activity
                        </button>
                    </div>

                    <div class="space-y-4">
                        <template x-for="(activity, index) in activities" :key="activity.id">
                            <div class="bg-slate-50 border border-slate-200 p-4 rounded-lg flex gap-4 items-start relative">
                                <div class="mt-2 text-slate-400 cursor-move">
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M10 9h4V6h3l-5-5-5 5h3v3zm-1 1H6V7l-5 5 5 5v-3h3v-4zm14 2l-5-5v3h-3v4h3v3l5-5zm-9 3h-4v3H7l5 5 5-5h-3v-3z"/></svg>
                                </div>
                                
                                <div class="flex-1 grid grid-cols-1 md:grid-cols-12 gap-4">
                                    <div class="md:col-span-4">
                                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Activity Name</label>
                                        <input type="text" x-model="activity.name" :name="'activities['+index+'][name]'" class="form-input w-full text-sm" required placeholder="e.g. Song Service">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Start Time</label>
                                        <input type="time" x-model="activity.start_time" :name="'activities['+index+'][start_time]'" class="form-input w-full text-sm">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">End Time</label>
                                        <input type="time" x-model="activity.end_time" :name="'activities['+index+'][end_time]'" class="form-input w-full text-sm">
                                    </div>
                                    <div class="md:col-span-4">
                                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Description (Optional)</label>
                                        <input type="text" x-model="activity.description" :name="'activities['+index+'][description]'" class="form-input w-full text-sm" placeholder="e.g. Choristers">
                                    </div>
                                </div>

                                <button type="button" @click="removeActivity(index)" class="text-rose-500 hover:text-rose-600 p-2 mt-4 md:mt-0 rounded bg-rose-50 hover:bg-rose-100 transition-colors">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 16 16"><path d="M5 7h6v2H5z" /></svg>
                                </button>
                            </div>
                        </template>
                        <div x-show="activities.length === 0" class="text-center p-6 border-2 border-dashed border-slate-200 rounded-lg text-slate-500">
                            No activities added. Click "Add Activity" to start building the program schedule.
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-8">
                    <a href="{{ route('admin.church-programs.index') }}" class="btn border-slate-200 hover:border-slate-300 text-slate-600">Cancel</a>
                    <button type="submit" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">Save Changes</button>
                </div>
            </form>
        </div>

    </div>

    <x-slot name="scripts">
        <script>
            // Pre-load existing activities from the database
            const existingActivities = @json($churchProgram->activities->map(function($act) {
                return [
                    'id' => $act->id,
                    'name' => $act->name,
                    'start_time' => $act->start_time ? \Carbon\Carbon::parse($act->start_time)->format('H:i') : '',
                    'end_time' => $act->end_time ? \Carbon\Carbon::parse($act->end_time)->format('H:i') : '',
                    'description' => $act->description ?? ''
                ];
            }));

            function programForm() {
                return {
                    activities: existingActivities.length > 0 ? existingActivities : [],
                    addActivity() {
                        this.activities.push({
                            id: Date.now(),
                            name: '',
                            start_time: '',
                            end_time: '',
                            description: ''
                        });
                    },
                    removeActivity(index) {
                        this.activities.splice(index, 1);
                    }
                }
            }
        </script>
    </x-slot>
</x-app-layout>
