<template>
    <Head title="Checkout" />
    <BaseLayout>
        <div class="flex flex-col w-full py-4">
            <h1 class="text-4xl font-semibold text-center pb-9 text-primary-text">Cart</h1>
            <div class="flex gap-[-2px] items-center justify-center">
                <div class="border flex items-center justify-center border-[#32CD32] rounded-full p-2">
                    <div class="bg-[#32CD32] h-2 w-2 rounded-full"></div>
                </div>
                <div class="h-[0.5px] bg-gray-500 w-[300px]"></div>
                <div class="flex items-center justify-center p-2 border border-gray-500 rounded-full">
                    <div class="w-2 h-2 bg-gray-500 rounded-full"></div>
                </div>
                <div class="h-[0.5px] bg-gray-500 w-[300px]"></div>
                <div class="flex items-center justify-center p-2 border border-gray-500 rounded-full">
                    <div class="w-2 h-2 bg-gray-500 rounded-full"></div>
                </div>
            </div>
            <div class="flex items-center justify-between w-full mx-auto mt-4 md:w-1/2">
                <h3 class="font-semibold text-primary-text">Shipping</h3>
                <h3 class="text-primary-dark">Payment</h3>
                <h3 class="text-primary-dark">Confirmation</h3>
            </div>

            <div class="flex flex-col justify-center w-full mx-auto my-9 md:p-9 md:flex-row md:gap-4">
                <div class="flex flex-col gap-4 px-5 py-4 text-sm bg-white md:w-2/3 md:px-12">
                    <h3 class="font-semibold text-center text-primary-text">Contact Information</h3>
                    <InputField label="" placeholder="Email" type="email" v-model="form.email" />
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="" id="">
                        <span class="text-sm text-primary-dark">Email me with News and Offers</span>
                    </div>
                    <h3 class="text-sm text-primary-text">Delivery Method</h3>
                    <div class="flex items-center justify-center gap-5 text-sm">
                        <div class="flex gap-2">
                            <input type="radio" id="ship" value="ship" v-model="form.deliveryMethod">
                            <label for="ship">Ship</label>
                        </div>
                        <div class="flex gap-2">
                            <input type="radio" id="pickup" value="pickup" v-model="form.deliveryMethod">
                            <label for="pickup">Pickup</label>
                        </div>
                    </div>

                    <form  class="flex flex-col w-full gap-2" @submit.prevent="handleCheckout">
                        <div v-if="form.deliveryMethod === 'ship'" class="flex flex-col gap-2">
                            <h1 class="pb-3 font-semibold text-md text-primary-text">Shipping Address</h1>
                            <div class="flex flex-col w-full gap-3 md:flex-row">
                                <InputField class="md:w-1/2" label="" placeholder="First Name" type="text" v-model="form.first_name" />
                                <InputField class="md:w-1/2" label="" placeholder="Last Name" type="text" v-model="form.last_name" />
                            </div>
                            <InputField label="" placeholder="Country" type="text" v-model="form.country" />
                            <InputField label="" placeholder="Address" type="text" v-model="form.address" />
                            <InputField label="" placeholder="Apartment" type="text" v-model="form.apartment" />
                            <div class="flex flex-col justify-between w-full gap-3 md:flex-row">
                                <InputField label="" class="1/3" placeholder="City" type="text" v-model="form.city" />
                                <InputField label="" class="1/3" placeholder="Province" type="text" v-model="form.province" />
                                <InputField label="" class="1/3" placeholder="Postal Code" type="text" v-model="form.postal_code" />
                            </div>
                            <div class="flex gap-2 mt-4 text-primary-dark">
                                <input type="radio" v-model="form.saveShippingAddress">
                                <p>Save this information for next time</p>
                            </div>
                        </div>


                        <div class="items-center justify-between hidden w-full pb-6 mt-6 md:flex">
                            <Link :href="route('cart.details')" class="flex gap-3 text-sm text-secondary"><p><</p> Return to Cart</Link>
                            <Button  :is-link="false" fill="secondary" textColor="white" :rounded="true" class="w-1/2">Continue to Payment</Button>
                        </div>
                    </form>
                </div>
                <div class="flex flex-col w-full md:gap-4">
                    <div class="flex-col gap-3 bg-white p-4 h-[50%]">
                        <h3 class="text-sm font-semibold text-center text-primary-text">Order Summary</h3>
                        <hr class="mt-3 mb-6">
                        <div class="flex flex-col gap-4">
                            <div class="flex justify-between gap-4">
                                <span class="text-primary-text">Items Total ({{count}})</span>
                                <span class="font-bold">€{{subtotal}}</span>
                            </div>
                            <div class="flex justify-between gap-4">
                                <span class="text-primary-text">Discounts</span>
                                <span class="font-bold">€0</span>
                            </div>
                            <div class="flex justify-between gap-4">
                                <span class="text-primary-text">Subtotal</span>
                                <span class="font-bold">€{{ subtotal }}</span>
                            </div>
                            <div class="flex justify-between gap-4">
                                <span class="text-primary-text">Shipping</span>
                                <span class="font-bold">€{{shipping}}</span>
                            </div>
                            <hr class="mt-3 mb-3">
                            <div class="flex justify-between gap-4 text-2xl font-bold">
                                <span class="text-primary-text">Total</span>
                                <span class="font-bold">€{{total}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 bg-white p-4 h-[20%]">
                        <div class="flex items-center gap-3">
                            <img src="/public/storage/icons/shield-check.png">
                            <span class="text-[#32CD32]">Buyer Protection</span>
                        </div>
                        <p class="text-md text-primary-text">Get full refund if the item is not as described or
                            if not delivered
                        </p>

                        <div class="flex items-center justify-between w-full pb-6 mt-6 md:hidden">
                            <Link :href="route('cart.details')" class="flex gap-3 text-sm text-secondary"><p><</p> Return to Cart</Link>
                            <Button :is-link="false" @click="handleCheckout"  fill="secondary" textColor="white" :rounded="true" class="text-sm md:text-md">Continue to payment</Button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </BaseLayout>
</template>

<script setup>
import { onMounted, ref } from "vue";
import BaseLayout from "../../Layouts/BaseLayout.vue";
import InputField from "../../Components/InputField.vue";
import { Link, useForm, Head } from "@inertiajs/vue3";
import Button from "../../Components/Button.vue";
import { computed } from "vue";
import { loadStripe } from "@stripe/stripe-js";
import { toast } from "vue3-toastify";

const props = defineProps({
  cartItems: Array,
  count: Number,
});

const subtotal = computed(() => {
  return Object.values(props.cartItems).reduce((sum, item) => {
    return sum + item.price * item.qty;
  }, 0);
});

const shipping = ref(0);
const total = computed(() => {
  return subtotal.value + shipping.value;
});

const form = useForm({
  email: "",
  first_name: "",
  last_name: "",
  country: "",
  address: "",
  apartment: "",
  city: "",
  province: "",
  postal_code: "",
  phone: "",
  deliveryMethod: "ship",
  saveShippingAddress: true,
});

const checkoutForm = useForm({
  cartItems: props.cartItems,
  shipping: 0,
});

const stripe = ref(null);

const handleCheckout = async () => {
    window.location.href = '/checkout/pay';
};
</script>


<style scoped>

</style>
