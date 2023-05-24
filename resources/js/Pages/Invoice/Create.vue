<script setup>
import {Head} from '@inertiajs/inertia-vue3'

defineProps({user: Object})

</script>

<template>
    <div class="container">
        <Head title="Invoice"/>
        <div v-if="step === 1" class="mt-4 flex flex-column justify-content-center text-center">
            <div class="mb-4"><h2>{{ invoice.user.name }}</h2></div>
            <div>За услугу "{{ invoice.service }}"</div>
            <div class="price">{{ invoice.price }} грн</div>
            <button @click="step = 2" type="button" class="btn btn-lg btn-secondary">Оплатить</button>
        </div>
        <div v-else-if="step === 2" class="mt-4">
            <form class="row g-3" @submit.prevent="save">
                <div class="col-12">
                    <label for="number" class="form-label">Номер карты</label>
                    <input v-model="invoice.card.number" required type="text" class="form-control" id="number"
                           placeholder="Номер карты">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">MM/YY</label>
                    <input v-model="invoice.card.expired_date" type="month" required class="form-control"
                           id="inputEmail4"
                           placeholder="MM/YY">
                </div>
                <div class="col-md-6">
                    <label for="cvv" class="form-label">CVV</label>
                    <input v-model="invoice.card.cvv" type="number" required class="form-control"
                           id="cvv"
                           placeholder="CVV">
                </div>
                <div class="col-12">
                    <label for="fullName" class="form-label">ФИО</label>
                    <input v-model="invoice.card.full_name" type="text" required class="form-control" id="fullName"
                           placeholder="ФИО">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Оплатить</button>
                </div>
            </form>
        </div>
        <div v-else class="mt-4">
            <h2> {{ status }} </h2>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            step: 1,
            status: '',
            services: [
                'ремонт холодильника',
                'ремонт ноутбука',
                'ремонт телевизора',
                'ремонт телефона',
                'мойка машины',
                'чистка ковров'
            ],
            invoice: {
                user: this.user,
                service: '',
                price: 0,
                card: {
                    number: null,
                    expired_date: '',
                    cvv: null,
                    full_name: ''
                }
            }
        }
    },
    methods: {
        async save() {
            try {
                const {data} = await axios.post(`/api/invoice`, this.invoice);
                this.status = data;
                this.step = 3;
            } catch (e) {
                console.log(e);
            }
        }
    },
    mounted() {
        this.invoice.price = Math.floor(Math.random() * 1000);
        this.invoice.service = this.services[Math.floor(Math.random() * this.services.length)];
    }
}
</script>

<style>
.price {
    margin: 5rem 0;
    font-size: 20px;
}
</style>
