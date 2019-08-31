Vue.component('team-table', {
    props: {
        users: Array
    },
    data: function() {
        return {
            teams: this.users,
            id: true,
            fullname: true,
            email_verif: true,
            university: true,
            status: true,
        }
    },
    methods: {
        compare(a, b) {
            if (a == null) return -1;
            if (b == null) return 1;
            if (a > b) return 1;
            else if (a < b) return -1;
            else return 0;
        },
        byEmailVerif(a, b) { return this.compare(a.email_verified_at, b.email_verified_at) },
        byFullname(a, b) { return this.compare(a.NamaLengkap, b.NamaLengkap) },
        byUniversity(a ,b) { return this.compare(a.AsalUniversitas, b.AsalUniversitas) },
        byId: (a, b) => { return a.id - b.id },
        byStatus: (a, b) => {
            if (a.pembayaran_lomba == null) return -1;
            if (b.pembayaran_lomba == null) return 1;
            return 0;
        },
        sortBy(comparator) {
            this.teams.sort(comparator)
        },
        reverse() {
            this.teams.reverse()
        },
        openModal(team) {
            this.$root.$emit('set-detail', team)
        }
    },
    watch: {
        id(val) {
            this.sortBy(this.byId)
            if (!val) this.reverse()
        },
        fullname(val) {
            this.sortBy(this.byFullname)
            if (!val) this.reverse()
        },
        email_verif(val) {
            this.sortBy(this.byEmailVerif)
            if (!val) this.reverse()
        },
        university(val) {
            this.sortBy(this.byUniversity)
            if (!val) this.reverse()
        },
        status(val) {
            this.sortBy(this.byStatus)
            if (!val) this.reverse()
        }

    },
    template:
    `
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col" @click="id = !id">
                    Kode Tim
                    <i class="fas" :class="id ? 'fa-caret-square-up' : 'fa-caret-square-down'"></i>
                </th>
                <th scope="col" @click="fullname = !fullname">
                    Nama Pendaftar
                    <i class="fas" :class="fullname ? 'fa-caret-square-up' : 'fa-caret-square-down'"></i>
                </th>
                <th scope="col" @click="email_verif = !email_verif">
                    Verifikasi Email
                    <i class="fas" :class="email_verif ? 'fa-caret-square-up' : 'fa-caret-square-down'"></i>
                </th>
                <th scope="col" @click="university = !university">
                    Asal Universitas
                    <i class="fas" :class="university ? 'fa-caret-square-up' : 'fa-caret-square-down'"></i>
                </th>
                <th scope="col" @click="status = !status">
                    Status Pembayaran
                    <i class="fas" :class="university ? 'fa-caret-square-up' : 'fa-caret-square-down'"></i>
                </th>
            </tr>
        </thead>
        <tr v-for="team in teams" @click="openModal(team)" data-toggle="modal" data-target="#detail-modal">
            <td>{{ team.id }}</div>
            <td>{{ team.NamaLengkap }}</div>
            <td>{{ team.email_verified_at ? team.email_verified_at : 'Not Verified' }}</td>
            <td>{{ team.AsalUniversitas }}</td>
            <td>{{ team.pembayaran_lomba ? 'Paid' : 'Not Paid' }}</td>

        </tr>
    </table>
    `
})
Vue.component('modal', {
    data() {
        return {
            detail: null
        }
    },
    mounted() {
        this.$root.$on('set-detail', team => {
            axios.get('team-detail',{
                params: {
                    id: team.id
                }
            }).then(response => {
                this.detail = response.data
            }).catch(() => {
                this.detail = null
            })
        });
    },
    template: `
    <!-- Modal -->
    <div class="modal fade" id="detail-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="detail-modal-title">DETAIL PESERTA</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" v-if="detail">
                    <div class="peserta" v-for="peserta in detail.detail_pesertas">
                        <div class="row detail-row">
                            <div class="col-12 text-center font-weight-bold detail-title">
                            Peserta {{detail.detail_pesertas.indexOf(peserta) + 1}}
                            </div>
                        </div>
                        <div class="row detail-row">
                            <div class="col-6">Nama Lengkap</div>
                            <div class="col-6">{{ peserta.NamaLengkap }}</div>
                        </div>
                        <div class="row detail-row">
                            <div class="col-6">NIM</div>
                            <div class="col-6">{{peserta.NIM}}</div>
                        </div>
                        <div class="row detail-row">
                            <div class="col-6">Jenis Kelamin</div>
                            <div class="col-6">{{peserta.JenisKelamin}}</div>
                        </div>
                        <div class="row detail-row">
                            <div class="col-6">Jurusan</div>
                            <div class="col-6">{{peserta.Jurusan}}</div>
                        </div>
                        <div class="row detail-row">
                            <div class="col-6">No. HP</div>
                            <div class="col-6">{{peserta.NoHP}}</div>
                        </div>
                        <div class="row detail-row">
                            <div class="col-6">Kartu Tanda Mahasiswa</div>
                            <div class="col-6">{{peserta.KartuTandaMahasiswa}}</div>
                        </div>
                    </div>
                    <div class="pembayaran" v-if="detail.pembayaran_lomba">
                        <div class="row detail-row">
                            <div class="col-12 text-center font-weight-bold detail-title">
                                Pembayaran
                            </div>
                        </div>
                        <div class="row detail-row">
                            <div class="col-6">Nama Bank</div>
                            <div class="col-6">{{detail.pembayaran_lomba.NamaBank}}</div>
                        </div>
                        <div class="row detail-row">
                            <div class="col-6">Nama Pengirim</div>
                            <div class="col-6">{{detail.pembayaran_lomba.NamaPengirim}}</div>
                        </div>
                        <div class="row detail-row">
                            <div class="col-6">Waktu Submit Transfer</div>
                            <div class="col-6">{{detail.pembayaran_lomba.WaktuSubmitTransfer}}</div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    `
})

var app = new Vue({
    el: '#app'
})
