<template>

    <div class="row" v-if="state == 'ready'">
        <div class="col-md-3">
            <div class="card" >
                <div class="card-body">
                    <label class="form-label">Search text</label>
                    <input type="text" class="form-control" placeholder="E.g., Mountain" v-model="search">

                    <p v-if="search.length < 2">You need to enter a longer search term</p>

                    <button @click="doSearch" class="btn mt-3" :class="searchButtonClass" :disabled="searchDisabled">{{ searchButtonLabel }}</button>

                    <div v-if="searched">
                        <hr>
                        <h3>{{ count }} Occurrances</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p v-else >
        Application is getting ready... {{ state }}
    </p>


</template>

<script>
export default {
    name: 'WordSearch',

    data() {

        let states = [
            'mounted',
            'loading',
            'building',
            'ready'
        ];

        return {
            dictionary: {},
            stateIndex: 0,
            states: states,
            search: '',
            count: 0,
            searched: false
        }
    },

    computed: {
        state() {
            return this.states[this.stateIndex];
        },

        searchDisabled() {
            return !this.search;
        },

        searchButtonClass() {
            return this.searchDisabled ? 'btn-outline-secondary' : 'btn-primary';
        },

        searchButtonLabel() {
            return this.searchDisabled ? 'Enter a search term' : 'Search';
        }
    },

    // when the component is mounted - init the dictionary!
    mounted() {
        this.initialiseDictionary();
    },

    watch: {
        search() {
            if (this.search != '')
                this.searched = false;
        }
    },

    methods: {

        doSearch() {
            let cleanSearch = this.cleanWord(this.search);
            this.count = this.dictionary[cleanSearch];
            this.search = '';
            this.searched = true;
        },

        advanceState() {
            this.stateIndex++;
        },

        initialiseDictionary() {
            this.advanceState();

            fetch('/api/text')
                .then(response => response.json())
                .then(data => this.parseText(data));
        },

        parseText(data) {
            this.advanceState();

            let words = this.getWords(data.text);
            let cleanedWords = this.cleanWords(words);
            this.dictionary = this.buildDictionary(cleanedWords);

            this.advanceState();
        },

        getWords(text) {
            return text.split(' ');
        },

        cleanWords(words) {
            return words.map(word => this.cleanWord(word));
        },

        cleanWord(word) {
            return word.toLowerCase().replace(/[^a-z]/gi, '');
        },

        buildDictionary(words) {
            let dictionary = {};

            words.forEach(word => {
                let count = dictionary[word] || 0;
                dictionary[word] = ++count;
            });

            return dictionary;
        }
    }
}
</script>


<style scoped>

</style>