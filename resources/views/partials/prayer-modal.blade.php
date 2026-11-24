<!-- Prayer Request Modal -->
<div x-data="{
        isOpen: false,
        isSubmitting: false,
        successMessage: '',
        errorMessage: '',
        formData: {
            name: '',
            category: '',
            request_text: ''
        },
        submitForm() {
            this.isSubmitting = true;
            this.errorMessage = '';
            this.successMessage = '';
            
            fetch('{{ route('prayer.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name=\'csrf-token\']').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: JSON.stringify(this.formData)
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => { throw err; });
                }
                return response.json();
            })
            .then(data => {
                this.successMessage = data.message || 'Your prayer request has been received. We are grateful that you shared it with us.';
                this.formData = { name: '', category: '', request_text: '' }; // Reset form
                this.isSubmitting = false;
                
                // Auto close after 3 seconds on success
                setTimeout(() => {
                    this.isOpen = false;
                    setTimeout(() => { this.successMessage = ''; }, 300);
                }, 3000);
            })
            .catch(error => {
                this.isSubmitting = false;
                if (error.errors) {
                    const firstErrorKey = Object.keys(error.errors)[0];
                    this.errorMessage = error.errors[firstErrorKey][0];
                } else {
                    this.errorMessage = error.message || 'An error occurred. Please try again.';
                }
            });
        }
    }"
    @open-prayer-modal.window="isOpen = true"
    x-show="isOpen"
    style="display: none; z-index: 1000;"
    class="fixed inset-0 overflow-y-auto"
    aria-labelledby="prayer-modal-title"
    role="dialog"
    aria-modal="true"
    x-effect="document.body.style.overflow = isOpen ? 'hidden' : ''">

    <div class="flex items-center justify-center min-h-screen px-4 py-8 text-center sm:p-0">
        <!-- Overlay -->
        <div x-show="isOpen"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm transition-opacity"
             @click="if(!isSubmitting) isOpen = false"
             aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <!-- Modal Panel -->
        <div x-show="isOpen"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative bg-white rounded-xl text-left shadow-2xl transform transition-all border border-gray-100 flex flex-col mx-auto"
             style="width: min(90vw, 620px); max-height: 90vh;">
            
            <!-- Close Button -->
            <div class="absolute top-0 right-0 pt-6 pr-6 z-20">
                <button @click="isOpen = false" :disabled="isSubmitting" type="button" class="bg-gray-100 rounded-full p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-200 focus:outline-none transition-colors disabled:opacity-50">
                    <span class="sr-only">Close</span>
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Success State -->
            <div x-show="successMessage" class="px-6 py-16 sm:px-10 text-center flex-1 overflow-y-auto" style="display: none;">
                <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-green-100 mb-6">
                    <svg class="h-10 w-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-3xl font-serif text-[#1E3F6C] mb-4" style="font-family: Georgia, serif;">Thank You</h3>
                <p class="text-gray-600 text-lg font-serif" x-text="successMessage"></p>
            </div>

            <!-- Form State -->
            <div x-show="!successMessage" class="flex flex-col h-full overflow-hidden">
                <div class="px-6 pt-10 pb-6 sm:px-10 border-b border-gray-100 flex-shrink-0 relative z-10 bg-white">
                    <h3 class="text-2xl sm:text-3xl font-serif text-[#1E3F6C]" id="prayer-modal-title" style="font-family: Georgia, serif; padding-right: 2rem;">
                        How Can We Pray for You?
                    </h3>
                    <p class="text-sm text-gray-500 mt-3 font-serif italic">
                        Your prayer request is kept strictly private and will only be shared with our authorized prayer team.
                    </p>
                </div>
                
                <div class="flex-1 overflow-y-auto bg-gray-50">
                    <form @submit.prevent="submitForm" class="px-6 py-8 sm:px-10 space-y-7">
                    
                    <div x-show="errorMessage" class="bg-red-50 text-red-700 p-3 rounded-md text-sm border border-red-100" style="display:none;" x-text="errorMessage"></div>

                    <!-- Name -->
                    <div class="flex flex-col space-y-2">
                        <label for="prayer_name" class="text-[15px] font-bold text-gray-800 font-sans">Name (Optional)</label>
                        <input type="text" x-model="formData.name" id="prayer_name" placeholder="Leave blank to remain anonymous" class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#2B548B] focus:ring focus:ring-[#2B548B] focus:ring-opacity-20 font-sans text-[15px] px-4 py-3 bg-white">
                    </div>

                    <!-- Category -->
                    <div class="flex flex-col space-y-2">
                        <label for="prayer_category" class="text-[15px] font-bold text-gray-800 font-sans">Prayer Category <span class="text-red-500">*</span></label>
                        <select x-model="formData.category" id="prayer_category" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#2B548B] focus:ring focus:ring-[#2B548B] focus:ring-opacity-20 font-sans text-[15px] px-4 py-3 bg-white">
                            <option value="" disabled>Select a category...</option>
                            <option value="Thanksgiving and Praise">Thanksgiving and Praise</option>
                            <option value="Personal Spiritual Growth">Personal Spiritual Growth</option>
                            <option value="Salvation and Faith">Salvation and Faith</option>
                            <option value="Healing and Health">Healing and Health</option>
                            <option value="Family and Relationships">Family and Relationships</option>
                            <option value="Marriage">Marriage</option>
                            <option value="Children and Parenting">Children and Parenting</option>
                            <option value="Grief and Loss">Grief and Loss</option>
                            <option value="Financial Needs">Financial Needs</option>
                            <option value="Employment and Career">Employment and Career</option>
                            <option value="Education and Studies">Education and Studies</option>
                            <option value="Guidance and Decision Making">Guidance and Decision Making</option>
                            <option value="Emotional Support">Emotional Support</option>
                            <option value="Strength During Difficult Times">Strength During Difficult Times</option>
                            <option value="Deliverance and Spiritual Struggles">Deliverance and Spiritual Struggles</option>
                            <option value="Church and Ministry">Church and Ministry</option>
                            <option value="Community and Society">Community and Society</option>
                            <option value="Mission and Evangelism">Mission and Evangelism</option>
                            <option value="World Events and Peace">World Events and Peace</option>
                            <option value="Special or Urgent Request">Special or Urgent Request</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <!-- Request -->
                    <div class="flex flex-col space-y-2">
                        <label for="prayer_request_text" class="text-[15px] font-bold text-gray-800 font-sans">Your Prayer Request <span class="text-red-500">*</span></label>
                        <textarea x-model="formData.request_text" id="prayer_request_text" rows="5" required placeholder="Describe what you would like prayer for..." class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#2B548B] focus:ring focus:ring-[#2B548B] focus:ring-opacity-20 font-sans text-[15px] px-4 py-3 bg-white resize-none"></textarea>
                    </div>
                    
                    <!-- Consent / Note -->
                    <div class="text-sm text-gray-500 font-sans">
                        By submitting this form, you consent to our pastoral team praying for your request.
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4 border-t border-gray-200">
                        <button type="submit" :disabled="isSubmitting" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-md shadow-sm text-[16px] font-bold font-sans text-white bg-[#2B548B] hover:bg-[#1E3F6C] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#2B548B] transition-colors disabled:opacity-70">
                            <span x-show="!isSubmitting">Submit Prayer Request</span>
                            <span x-show="isSubmitting" class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Processing...
                            </span>
                        </button>
                    </div>
                </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
