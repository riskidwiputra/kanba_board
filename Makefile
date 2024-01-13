build-nginx:
	docker image build -f resources/ops/docker/nginx/Dockerfile -t laravel-kanbaboard-project-nginx:latest --target nginx .