plugins {
	java
	id("org.springframework.boot") version "3.0.2"
	id("io.spring.dependency-management") version "1.1.0"
	id("org.openapi.generator") version "6.2.1"
}

configurations {
	compileOnly {
		extendsFrom(configurations.annotationProcessor.get())
	}
}

group = "com.nebelriss"
version = "0.0.1-SNAPSHOT"
java.sourceCompatibility = JavaVersion.VERSION_17

repositories {
	mavenCentral()
}

dependencies {
	implementation("org.springframework.boot:spring-boot-starter-data-jpa")
	implementation("org.springframework.boot:spring-boot-starter-web")
	implementation("org.springframework.boot:spring-boot-starter-validation")
	annotationProcessor("org.springframework.boot:spring-boot-configuration-processor")
	developmentOnly("org.springframework.boot:spring-boot-devtools")

	implementation("javax.validation:validation-api:2.0.1.Final")
	implementation("org.glassfish:javax.annotation:10.0-b28")
	implementation("javax.servlet:javax.servlet-api:3.0.1")

	implementation("io.swagger.core.v3:swagger-annotations:2.1.12")
	implementation("io.swagger:swagger-annotations:1.6.4")

	compileOnly("org.projectlombok:lombok")
	annotationProcessor("org.projectlombok:lombok")

	runtimeOnly("org.postgresql:postgresql")

	testImplementation("org.springframework.boot:spring-boot-starter-test")
}

sourceSets {
	main {
		java {
			srcDirs("$buildDir/generated/src/main/java")
		}
	}
}

tasks.withType<Test> {
	useJUnitPlatform()
}

tasks.withType<JavaCompile> {
	dependsOn(tasks.openApiGenerate)
}

openApiGenerate {
	generatorName.set("spring")
	inputSpec.set("$projectDir/src/main/resources/turnej-api.yaml")
	outputDir.set("$buildDir/generated")
	apiPackage.set("com.nebelriss.api")
	modelPackage.set("com.nebelriss.model")
	modelNameSuffix.set("Data")
	configOptions.set(
		mapOf(
			"dateLibrary" to "java8",
			"generateApis" to "true",
			"generateApiTests" to "false",
			"generateModels" to "true",
			"generateModelTests" to "false",
			"generateModelDocumentation" to "false",
			"generateSupportingFiles" to "false",
			"hideGenerationTimestamp" to "true",
			"interfaceOnly" to "true",
			"library" to "spring-boot",
			"serializableModel" to "true",
			"useBeanValidation" to "true",
			"useTags" to "true",
			"implicitHeaders" to "true",
			"openApiNullable" to "false",
			"oas3" to "true"
		)
	)
}
