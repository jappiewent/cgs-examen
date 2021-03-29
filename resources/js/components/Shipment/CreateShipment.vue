<template>
    <div class="container">
        <b-row>
            <b-col>
                <b-form-group label="Reference">
                    <b-form-input v-model="shipment.reference" type="number" required/>
                </b-form-group>
                <b-form-group label="Address">
                    <b-form-input v-model="shipment.address" type="number" required/>
                </b-form-group>
                <b-form-group label="City">
                    <b-form-input v-model="shipment.city" type="number" required/>
                </b-form-group>
                <b-form-group label="Company">
                    <b-form-select :options="customers" v-model="shipment.company_id" required/>
                </b-form-group>
            </b-col>
        </b-row>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            shipment: {
                reference: null,
                address: null,
                city: null,
                company_id: null,
            },
            customers : null,
        }
    },
    methods: {
        createShipment: async function() {
            const response = await axios.post('/api/shipments',{
                reference: this.reference,
                address: this.address,
                city: this.city,
            });
        },
        getCustomers: async function() {
            const response = await axios.get('/api/customers');
            this.customer = response.data;
        },
    },
    beforeMount() {
        this.getCustomers();
    }
}
</script>
