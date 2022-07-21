<template>
    <page-home
        slug="employee" parent="system-dashboard" title="Agenda"
    > 
        <v-card
            class="mx-auto"
        >
            <v-combobox
                v-model="select"
                :items="items"
                label="Unit Kerja"
                multiple
                outlined
                dense
                ></v-combobox>
            <div>
            <v-text-field
                    class="ml-2"
                    label="Perihal/Kegiatan"
                    :rules="rules"
                    hide-details="auto"
            ></v-text-field>
            <v-text-field class="ml-2" label="Tempat Kegiatan"></v-text-field>
            </div>

            <v-textarea
                class="ml-2"
                background-color="white"
                color="black"
                label="Keterangan"
            >
            </v-textarea>
            <v-file-input
                label="File input"
                outlined
                dense
            ></v-file-input>
            <v-btn
                class="ml-2 mr-4 mb-2"
                color="success"
            >Simpan
            </v-btn>
            <v-btn
                class="mr-4 mb-2"
                color="error"
            >Batal
            </v-btn>
        </v-card>
    </page-home>
</template>