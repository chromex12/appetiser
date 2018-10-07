<template>
    <div id="layout-template">
            <Layout>
            <Header id='layout-h'>
            </Header>
            <Content :style="{padding: '0 50px'}">
                <Breadcrumb :style="{margin: '20px 0'}">
                    <BreadcrumbItem>Registration</BreadcrumbItem>
                </Breadcrumb>
                <Card>
                    <div style="min-height: 250px;">
                        <form-template></form-template>
                    </div>
                </Card>
            </Content>
            <Footer class="layout-footer-center">Appetiser</Footer>
        </Layout>
    </div>
</template>

<script>
import FormTemplate from '@/components/Form'
export default {
    name: "layout-template",
    components: {
        FormTemplate
    }
}
</script>

<style scoped>
    #layout-template {
        width: 100%;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        top: 0;
        z-index: 999;
        
    }
    #layout-h {
        background-color: #0091EA;
    }
</style>
