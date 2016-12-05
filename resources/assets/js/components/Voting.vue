<template>
	<div class="vote__links">
		<button @click="upVote" class="btn btn-link" :class="userUpVoted">
			<span class="glyphicon glyphicon-thumbs-up"></span>
			<span v-text="votes.up"></span>
		</button>
		<button @click="downVote" class="btn btn-link">
			<span class="glyphicon glyphicon-thumbs-down"></span>
			<span v-text="votes.down"></span>
		</button>
	</div>
</template>

<script>
	export default {
		props: {
			type: null,
			uid: null
		},
		data() {
			return {
				auth: false,
				upVoted: null,
				downVoted: null,
				votes: {
					user_voted: null,
					up: 0,
					down: 0
				}
			}
		},
		mounted() {
			if(window.Board.auth !== false) {
				this.auth = true;
			}
			this.getVotes();
		},
		methods: {
			getVotes: function() {
				this.$http.post('/api/v1/votes/count', {
					type: this.type,
					uid: this.uid
				}).then(function(response) {
					this.setVotesData(response);
				});
			},
			upVote: function() {
				this.$http.post('/api/v1/votes', {
					type: this.type,
					uid: this.uid,
					up: true
				}).then(function(response) {
					this.setVotesData(response);
				});
			},
			downVote: function() {
				this.$http.post('/api/v1/votes', {
					type: this.type,
					uid: this.uid,
					down: true
				}).then(function(response) {
					this.setVotesData(response);
				});
			},
			setVotesData: function(response) {
				this.votes = {
					user_voted: response.data.user_voted,
					up: response.data.up_votes,
					down: response.data.down_votes
				};
				if(response.data.user_voted != false) {
					if(response.data.user_voted == 'up') {
						this.upVoted = 'voted__color';
						this.downVoted = null;
					} else if(response.data.user_voted == 'down') {
						this.upVoted = false;
						this.downVoted = true;
					}
				}
				return;
			}
		}
	}
</script>

<style>
	.voted__color {
		color: blue;
	}
</style>