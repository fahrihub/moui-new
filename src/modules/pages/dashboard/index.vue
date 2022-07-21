<template>
    <page-home>
        <v-row>
            <v-col cols="12">
                <v-card 
                    class="mx-auto"
                    max-width="600"
                    outlined
                    elevation="4"
                    shaped
                >
                    <v-list-item three-line>
                        <v-list-item-content>
                            <div class="text-h4 text-overline mb-3 font-weight-bold">
                                Pegawai Non ASN
                                <v-divider></v-divider>
                            </div>
                            <v-list-item-title class="text-h5 mb-1">7557</v-list-item-title>
                            <v-list-item-subtitle>Jumlah Pegawai</v-list-item-subtitle>
                        </v-list-item-content>
                        <v-list-item-avatar
                            size="100"
                            color="success"
                        >
                            <v-icon dark size="50">database</v-icon>
                        </v-list-item-avatar>
                    </v-list-item>
                    <v-card-actions>
                        <v-btn
                            color="success"
                        >Lihat Data
                            <v-icon right dark>
                                drive_file_move
                            </v-icon>
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-col>
            <v-col>
                <v-sheet
                    height="400"
                >
                    <v-calendar-weekly
                        color="primary"
                    >
                    </v-calendar-weekly>
                </v-sheet>
            </v-col>
        </v-row>

    </page-home>
</template>

<script>

</script>