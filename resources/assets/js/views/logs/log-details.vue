<template>
    <div class="log-details">
        <div class="columns">
            <!-- Head Information -->
            <div class="column log-level">{{ log.level.substring(0, 1).toUpperCase() }}</div>
            <div class="column log-message">{{ log.message }}</div>
            <div class="column log-time">{{ log.created_at | fromNow }}</div>
            <div class="column log-buttons">
                <button class="button is-small" type="button" @click="toggleDetails">Details</button>
            </div>
        </div>

        <!-- Full Details -->
        <div v-if="ui.isShowingDetails">
            <div class="tabs is-boxed is-small">
                <ul>
                    <li :class="{'is-active': isShowingTab('request')}">
                        <a @click="showTab('request')">Request</a>
                    </li>
                    <li :class="{'is-active': isShowingTab('input')}">
                        <a @click="showTab('input')">Input</a>
                    </li>
                    <li :class="{'is-active': isShowingTab('context')}" v-if="fullLog.context">
                        <a @click="showTab('context')">Context</a>
                    </li>
                    <li :class="{'is-active': isShowingTab('exception')}" v-if="fullLog.exception">
                        <a @click="showTab('exception')">Exception</a>
                    </li>
                    <li :class="{'is-active': isShowingTab('trace')}" v-if="fullLog.trace">
                        <a @click="showTab('trace')">Trace</a>
                    </li>
                </ul>
            </div>

            <!-- Request Tab -->
            <div class="log-tab" v-show="isShowingTab('request')">
                <div class="columns">

                    <!-- Request Client IP -->
                    <div class="column">
                        <strong>Client IP:</strong>
                        <p>{{ fullLog.request_client }}</p>
                    </div>

                    <!-- Request Method -->
                    <div class="column">
                        <strong>Request Method:</strong>
                        <p>{{ fullLog.request_method }}</p>
                    </div>

                    <!-- Request Path -->
                    <div class="column">
                        <strong>Request Path:</strong>
                        <p>{{ fullLog.request_path }}</p>
                    </div>
                </div>
            </div>

            <!-- Input Tab -->
            <div class="log-tab" v-show="isShowingTab('input')">
                <pre class="log-input">{{ fullLog.request_input }}</pre>
            </div>

            <!-- Context Tab -->
            <div class="log-tab" v-show="isShowingTab('context')">
                <pre class="log-context">{{ fullLog.context }}</pre>
            </div>

            <!-- Exception Tab -->
            <div class="log-tab" v-show="isShowingTab('exception')">
                <div class="content">
                    <p>
                        <strong>Raised exception:</strong><br>
                        <code>{{ fullLog.exception }}</code>
                    </p>
                    <p>
                        <strong>Error Code:</strong><br>
                        <code>{{ fullLog.code }}</code>
                    </p>
                    <p>
                        <strong>Script</strong><br>
                        <code>{{ fullLog.script_path }} line {{ fullLog.script_line }}</code>
                    </p>
                </div>
            </div>

            <!-- Trace Tab -->
            <div class="log-tab" v-show="isShowingTab('trace')">
                <pre class="log-trace">{{ fullLog.trace }}</pre>
            </div>

        </div>
    </div>
</template>

<script>
import BaguLog from '../../models/BaguLog';

export default {
    name: 'Details',
    props: {
        log: {
            type: Object,
            required: true
        }
    },

    data()
    {
        return {
            fullLog: null,
            ui: {
                isShowingDetails: false,
                showingTab: 'request'
            }
        };
    },

    methods: {
        toggleDetails(param)
        {
            if (this.ui.isShowingDetails) {
                this.closeDetails();
            } else {
                this.openDeails();
            }
        },

        openDeails()
        {
            if (this.fullLog) {
                this.ui.isShowingDetails = true;
            } else {
                BaguLog.find(this.log.id).then(log => {
                    this.fullLog = log;
                    this.ui.isShowingDetails = true;
                });
            }
        },

        closeDetails()
        {
            this.ui.isShowingDetails = false;
        },

        showTab(tab)
        {
            this.ui.showingTab = tab;
        },

        isShowingTab(tab)
        {
            return this.ui.showingTab === tab;
        }
    }
}
</script>
