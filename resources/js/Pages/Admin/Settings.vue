<template>
    <AuthLayout>
        <div class="flex flex-col w-full h-full gap-6 p-4 mt-20 md:p-9 ">
            <div class="flex justify-between">
                <h1 class="text-4xl font-bold text-primary-text">Settings</h1>
                <div class="flex gap-3">
                    <Button fill="primary" class="border border-gray-300">Cancel</Button>
                    <Button fill="secondary" textColor="white" @click="submitForm">Save Changes</Button>
                </div>
            </div>
            <div class="flex flex-col gap-3 p-4 bg-white md:flex-row">
                <div class="flex flex-col gap-3 md:w-1/2">
                    <section class="flex flex-col gap-3">
                        <h3 class="mt-2 text-sm font-semibold text-blac">Change password</h3>
                        <form class="flex flex-col gap-2 p-3 border border-gray-300">
                            <InputField label="Current password" type="password" placeholder="Enter old password"/>
                            <InputField label="New password" type="password" placeholder="Enter new password"/>
                            <InputField label="Confirm password" type="password" placeholder="Re-enter new password"/>
                        </form>
                    </section>
                    <section class="flex flex-col gap-3">
                        <h3 class="mt-2 text-sm font-semibold text-black">Notifications</h3>
                        <div class="flex flex-col p-3 border border-gray-300">
                          <div class="flex items-center justify-between p-2 border border-gray-300">
                            <div class="flex flex-col gap-2 text-sm">
                              <h3 class="font-semibold">Email notification</h3>
                              <p>Send me order updates by email</p>
                            </div>
                            <!-- Toggle Switch -->
                            <div class="relative flex items-center">
                                <span class="mr-2 text-sm font-semibold text-gray-700">{{ form.email_notifications ? 'On' : 'Off' }}</span>
                              <input
                                type="checkbox"
                                id="emailToggle"
                                class="hidden peer"
                                v-model="form.email_notifications"
                              />
                              <label
                                for="emailToggle"
                                class="flex items-center w-12 h-6 p-1 transition-all duration-300 rounded-full cursor-pointer bg-primary peer-checked:bg-secondary"
                              >
                                <span
                                  class="w-4 h-4 transition-transform duration-300 transform bg-white rounded-full shadow peer-checked:translate-x-6"
                                ></span>
                              </label>

                            </div>
                          </div>
                        </div>
                    </section>
                </div>
                <div class="flex flex-col gap-3 md:w-1/2">
                    <section class="flex flex-col gap-3">
                        <h3 class="mt-2 text-sm font-semibold text-black">Edit profile</h3>
                        <form class="flex flex-col gap-2 p-3 border border-gray-300" @submit.prevent="submitForm">
                            <InputField label="Your Name" type="text" placeholder="Enter name" v-model="form.name"/>
                            <InputField label="Email" type="email" placeholder="Enter email" v-model="form.email"/>
                            <InputField label="Store Name" type="text" placeholder="Store name" v-model="form.store_name"/>
                            <InputField label="Store Location" type="text" placeholder="Store location" v-model="form.location"/>
                            <label for="currency" class="">Currency</label>
                            <select id="currency" name="currency" class="p-2 border rounded-md" v-model="form.currency">
                                <option v-for="(currency, code) in currencies" :key="code" :value="code">
                                    {{ currency.symbol }} - {{ currency.name }}
                                </option>
                                <option value="custom">Other (Enter manually)</option>
                            </select>
                            <input v-if="form.currency === 'custom'" type="text" v-model="customCurrency" placeholder="Enter custom currency" class="p-2 mt-2 border rounded-md"/>
                        </form>
                    </section>

                </div>
            </div>
        </div>
    </AuthLayout>
</template>

<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue';
import Button from '@/Components/Button.vue';
import InputField from '../../Components/InputField.vue';
import { ref, watch } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { toast } from 'vue3-toastify';

const currencies = {
    EUR: { name: 'Euro', symbol: '€' },
    USD: { name: 'US Dollar', symbol: '$' },
    GBP: { name: 'British Pound', symbol: '£' },
    JPY: { name: 'Japanese Yen', symbol: '¥' },
    AUD: { name: 'Australian Dollar', symbol: 'A$' },
    CAD: { name: 'Canadian Dollar', symbol: 'C$' },
    CHF: { name: 'Swiss Franc', symbol: 'CHF' },
    CNY: { name: 'Chinese Yuan', symbol: '¥' },
    SEK: { name: 'Swedish Krona', symbol: 'kr' },
    NZD: { name: 'New Zealand Dollar', symbol: 'NZ$' },
};

const props = defineProps({
    store: Object,
    auth: Object
});

const form = useForm({
    name: props.auth.user.name,
    email: props.auth.user.email,
    store_name: props.store.name,
    location: props.store.location,
    currency: props.store.currency,
    email_notifications: props.store.email_notifications,
});

const customCurrency = ref('');

watch(() => form.currency, (newCurrency) => {
    if (!currencies[newCurrency] && newCurrency !== 'custom') {
        customCurrency.value = newCurrency;
        form.currency = 'custom';
    }
});

const submitForm = () => {
    if (form.currency === 'custom') {
        form.currency = customCurrency.value;
    }

    form.post(route('admin.settings.update'), {
        onSuccess: () => {
            toast.success("Update Successful");
        },
        onError: (error) => {
            console.log(error)
            toast.error("Failed to Update Details");
        },
    });
};
</script>

<style scoped>
/* Add any additional styles here */
label.inline-flex.items-center.cursor-pointer input:checked + div {
    background-color: #4ade80; /* Tailwind green-400 */
}
label.inline-flex.items-center.cursor-pointer input:checked + div + .dot {
    transform: translateX(100%);
}
label.inline-flex.items-center.cursor-pointer .dot {
    transition: transform 0.3s ease-in-out;
}
</style>
