<template>
    <page-home>
        <v-container>
        <v-row>
            <v-row class="fill-height">
            <v-col>
                <v-sheet height="64">
                <v-toolbar
                    flat
                >
                    <v-btn
                        outlined
                        class="mr-4"
                        color="grey darken-2"
                        @click="setToday"
                    >
                    Today
                    </v-btn>
                    <v-btn
                        fab
                        text
                        small
                        color="grey darken-2"
                        @click="prev"
                    >
                        <v-icon small>
                    skip_previous
                        </v-icon>
                    </v-btn>
                    <v-btn
                        fab
                        text
                        small
                        color="grey darken-2"
                        @click="next"
                    >
                        <v-icon small>
                    skip_next
                        </v-icon>
                    </v-btn>
                    <v-toolbar-title v-if="$refs.calendar">
                        {{ $refs.calendar.title }}
                    </v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-menu
                        right
                        bottom
                    >
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn
                                outlined
                                color="grey darken-2"
                                v-bind="attrs"
                                v-on="on"
                            >Bulan
                            <v-icon right>expand_more</v-icon>
                            </v-btn>
                        </template>
                        <v-list>
                            <v-list-item @click="type = 'day'">
                                <v-list-item-title>Day</v-list-item-title>
                            </v-list-item>
                            <v-list-item @click="type = 'week'">
                                <v-list-item-title>Week</v-list-item-title>
                            </v-list-item>
                            <v-list-item @click="type = 'month'">
                                <v-list-item-title>Month</v-list-item-title>
                            </v-list-item>
                            </v-list>
                    </v-menu>            
                </v-toolbar>
                </v-sheet>
                <v-sheet>
                    <v-calendar
                        color="primary"
                        v-model="focus"
                        @change="updateRange"
                    >
                    </v-calendar>
                </v-sheet>
            </v-col>
            </v-row>
        </v-row>
    </v-container>
    </page-home>
</template>

<script>
    export default {
        data:() => ({
            focus: '',
            type: 'month',
            typeToLabel: {
                month: 'Month',
                week: 'Week',
                day: 'Day',
            },
        }),
        mounted () {
            this.$refs.calendar.checkChange()
        },

    }
</script>