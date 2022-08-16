<template>
    <page-home slug="dashboard" @initialized="initialized">
        <template v-slot:default="{ store }">
            <v-container>
                <v-row>
                    <v-row class="fill-height">
                        <!-- kalender -->
                        <v-col cols="12">
                            <v-sheet height="64">
                                <v-toolbar flat>
                                    <v-btn
                                        fab
                                        text
                                        small
                                        color="grey darken-2"
                                        @click="prev(store)"
                                    >
                                        <v-icon small> skip_previous </v-icon>
                                    </v-btn>
                                    <v-btn
                                        fab
                                        text
                                        small
                                        color="grey darken-2"
                                        @click="next(store)"
                                    >
                                        <v-icon small> skip_next </v-icon>
                                    </v-btn>
                                    <v-toolbar-title v-if="$refs.calendar">
                                        {{ $refs.calendar.title }}
                                    </v-toolbar-title>
                                    <v-spacer></v-spacer>
                                </v-toolbar>
                            </v-sheet>
                            <v-sheet>
                                <v-calendar
                                    v-model="focus"
                                    ref="calendar"
                                    color="primary"
                                    :events="events"
                                    type="month"
                                    @change="updateRange"
                                >
                                </v-calendar>
                            </v-sheet>
                        </v-col>

                        <!-- Tabel -->
                        <v-col cols="12" class="mt-1">
                            <v-card class="mx-auto" max-width="100%">
                                <template>
                                    <v-simple-table fixed-header height="200px">
                                        <template v-slot:default>
                                            <thead>
                                                <tr>
                                                    <th class="text-left">
                                                        NO
                                                    </th>
                                                    <th class="text-left">
                                                        Bidang
                                                    </th>
                                                    <th class="text-left">
                                                        Sub Bidang
                                                    </th>
                                                    <th class="text-left">
                                                        Nama Kegiatan
                                                    </th>
                                                    <th class="text-left">
                                                        Laporan Kegiatan
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    v-for="(
                                                        data, index
                                                    ) in datatable"
                                                    :key="index"
                                                >
                                                    <td>{{ index + 1 }}</td>
                                                    <td>
                                                        {{ data.section.name }}
                                                    </td>
                                                    <td>
                                                        {{
                                                            data.subsection.name
                                                        }}
                                                    </td>
                                                    <td>{{ data.name }}</td>
                                                    <td>{{ data.report }}</td>
                                                </tr>
                                            </tbody>
                                        </template>
                                    </v-simple-table>
                                </template>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-row>
            </v-container>
        </template>
    </page-home>
</template>

<script>
export default {
    data: () => ({
        datatable: [],
        events: [],
        focus: "",
        type: "month",
        typeToLabel: {
            month: "Month",
            week: "Week",
            day: "Day",
        },
    }),
    mounted() {
        // this.focus = new Date();
        setTimeout(() => {
            // console.log(this.$refs.calendar);
            this.$refs.calendar.checkChange();
        }, 300);
    },

    methods: {
        initialized(response) {
            this.events = response.events;
            this.focus = response.focus;
            this.datatable = response.datatable;
        },

        updateRange() {},
        prev(store) {
            // console.log(this.$refs.calendar);
            this.$refs.calendar.prev();
            store.$http("api/dashboard/" + this.focus).then((response) => {
                this.datatable = response.datatable;
            });
        },

        next(store) {
            this.$refs.calendar.next();
            store.$http("api/dashboard/" + this.focus).then((response) => {
                this.datatable = response.datatable;
            });
        },
    },
};
</script>
